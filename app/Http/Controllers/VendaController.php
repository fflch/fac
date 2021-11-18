<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Venda;
use App\Models\ParcelaVenda;
use App\Models\Associado;
use App\Http\Requests\VendaRequest;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\DB;

class VendaController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('conveniado');

        $conveniado = Auth::user()->conveniado();

        $vendas = new Venda;

        // Campo de busca
        if($request->search) {

            $vendas = $vendas->where(function( $query ) use ( $request ){

                // Model: Associado  campo: name
                $query->orWhereHas('associado', function (Builder $query) use ($request){
                    $query->where('name','LIKE',"%{$request->search}%");
                })

                // Model: Conveniado  campos: razao_social, nome_fantasia
                ->orWhereHas('conveniado', function (Builder $query) use ($request){
                    $query->where('nome_fantasia','LIKE',"%{$request->search}%")
                        ->orWhere('razao_social','LIKE',"%{$request->search}%");
                });
            });

        }

        if ($conveniado) $vendas = $vendas->where('conveniado_id', $conveniado->id)->paginate(10);
        else $vendas = $vendas->orderBy('data_venda', 'desc')->paginate(10);

        return view ('vendas.index',[
            'vendas' => $vendas
        ]);
    }

    public function create()
    {
        $this->authorize('conveniado');

        // verifica se o usuário é um conveniado
        $conveniado = Auth::user()->conveniado();
        
        return view ('vendas.create',[
            'venda' => new Venda,
            'objeto'  => isset($conveniado) ? $conveniado : FALSE,
        ]);
    }

    public function store(VendaRequest $request)
    {
        $this->authorize('conveniado');

        $validated = $request->validated();

        // verificar se o associado possui saldo para realizar a compra
        $associado = Associado::where('id', $validated['associado_id'])->first();

        if ($validated['valor'] <= $associado->limite) {

            $venda = Venda::create($validated);
            $associado->limite = $associado->limite - $validated['valor'];
            $associado->update();
            return redirect("/vendas/{$venda->id}");

        } else {

            request()->session()->flash('alert-danger','Valor da compra superior ao limite de R$ ' . $associado->limite . ' disponível para '. $associado->name);
            return redirect('/vendas/create');

        } 
    }

    public function show(Venda $venda)
    {
        $this->authorize('conveniado',$venda);

        /*Relacionamento entre o Conveniado e o Associado*/
        $conveniado = $venda->conveniado()->first();
        $associado = $venda->associado()->first();

        $venda->data_venda = $venda->data_venda;
        return view ('vendas.show',[
            'venda'         => $venda,
        ]);
    }

    public function destroy(Venda $venda)
    {
        $this->authorize('admin');
         
        // DB::transaction(function($venda) {

            $venda->parcelas()->delete();
            $venda->delete();

        //});


        return redirect ('/vendas');
    }
}
