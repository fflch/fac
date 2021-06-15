<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Venda;
use App\Models\ParcelaVenda;
use App\Http\Requests\VendaRequest;
use Carbon\Carbon;
use Auth;

class VendaController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('admin');

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

        $vendas = $vendas->paginate(10);

        return view ('vendas.index',[
            'vendas' => $vendas
        ]);
    }

    public function create()
    {
        $this->authorize('conveniado');

        // verifica se o usuário é um conveniado
        $conveniado = Auth::user()->conveniados()->first();

        return view ('vendas.create',[
            'venda' => new Venda,
            'objeto'  => isset($conveniado) ? $conveniado : FALSE,
        ]);
    }

    public function store(VendaRequest $request)
    {
        $this->authorize('conveniado');
        $validated = $request->validated();
        $validated['data_venda'] = implode('-',array_reverse(explode('/',$request->data_venda)));
        $valor = $validated['valor'];

        $venda = Venda::create($validated);

        # Lanças as parcelas
        for($i = 1 ; $i <= $venda->quantidade_parcelas; $i++){
            $parcela_venda = new ParcelaVenda;
            $parcela_venda->venda_id = $venda->id;
            $parcela_venda->numero = $venda->quantidade_parcelas; # redundante
            $parcela_venda->valor = $valor/$venda->quantidade_parcelas;
            # Vamos fixar no dia 10 de cada mês
            $date = Carbon::now();
            $parcela_venda->datavencto = $date->day(10)->addMonth($i);;
            $parcela_venda->status = 'A Vencer';
            $parcela_venda->save();
        }

        return redirect("/vendas/$venda->id");
    }

    public function show(Venda $venda)
    {
        $this->authorize('conveniado');
        /*Relacionamento entre o Conveniado e o Associado*/
        $conveniado = $venda->conveniado()->first();
        $associado = $venda->associado()->first();

        $venda->data_venda = implode('/',array_reverse(explode('-',$venda->data_venda)));
        return view ('vendas.show',[
            'venda'         => $venda,
        ]);
    }

    public function edit(Venda $venda)
    {
        $this->authorize('admin');
        $venda->data_venda = implode('/',array_reverse(explode('-',$venda->data_venda)));
        return view ('vendas.edit',[
            'venda' => $venda,
            'objeto' => FALSE,
        ]);
    }

    public function update(VendaRequest $request, Venda $venda)
    {
        $this->authorize('admin');
        $validated = $request->validated();
        $validated['data_venda'] = implode('-',array_reverse(explode('/',$request->data_venda)));
        $venda->update($validated);

        return redirect("/vendas/$venda->id");
    }

    public function destroy(Venda $venda)
    {
        $this->authorize('admin');
        $venda->delete();
        return redirect ('/vendas');
    }
}
