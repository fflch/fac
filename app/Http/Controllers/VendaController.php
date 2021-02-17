<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venda;
use App\Models\ParcelaVenda;
use App\Http\Requests\VendaRequest;
use Carbon\Carbon;

class VendaController extends Controller
{
    public function index()
    {
        $this->authorize('admin');
        $vendas = Venda::paginate(10);
        return view ('vendas.index',[
            'vendas' => $vendas
        ]);
    }

    public function create() 
    {
        $this->authorize('admin');
        return view ('vendas.create',[
            'venda' => new Venda
        ]);
    }

    public function store(VendaRequest $request) 
    {
        $this->authorize('admin');
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
        $this->authorize('admin');
        /*Relacionamento entre o Conveniado e o Associado*/
        $conveniado = $venda->conveniado()->first();
        $associado = $venda->associado()->first();

        $venda->data_venda = implode('/',array_reverse(explode('-',$venda->data_venda)));
        return view ('vendas.show',[
            'venda' => $venda
        ]);
    }      

    public function edit(Venda $venda) 
    {
        $this->authorize('admin');
        $venda->data_venda = implode('/',array_reverse(explode('-',$venda->data_venda)));
        return view ('vendas.edit',[
            'venda' => $venda
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
