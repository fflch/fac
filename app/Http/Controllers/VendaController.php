<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venda;

class VendaController extends Controller
{
    public function index()
    {
        $vendas = Venda::paginate(10);
        return view ('vendas.index',[
            'vendas' => $vendas
        ]);
    }

    public function create() 
    {
        return view ('vendas.create',[
            'venda' => new Venda
        ]);
    }

    public function store(Request $request) 
    {
        $venda = new Venda;

        $venda->id_conveniado = $request->id_conveniado;
        $venda->id_associado = $request->id_associado;
        $venda->data_venda = implode('-',array_reverse(explode('/',$request->data_venda)));
        $venda->quantidade_parcelas = $request->quantidade_parcelas;
        $venda->valor = $request->valor;
        $venda->descricao = $request->descricao;
        $venda->status = $request->status;

        $venda->save();

        return redirect("/vendas/$venda->id");   
    }

    public function show(Venda $venda) 
    {
        $venda->data_venda = implode('/',array_reverse(explode('-',$venda->data_venda)));
        return view ('vendas.show',[
            'venda' => $venda
        ]);
    }      

    public function edit(Venda $venda) 
    {
        $venda->data_venda = implode('/',array_reverse(explode('-',$venda->data_venda)));
        return view ('vendas.edit',[
            'venda' => $venda
        ]);
    }

    public function update(Request $request, Venda $venda) 
    {
        $venda->id_conveniado = $request->id_conveniado;
        $venda->id_associado = $request->id_associado;
        $venda->data_venda = implode('-',array_reverse(explode('/',$request->data_venda)));
        $venda->quantidade_parcelas = $request->quantidade_parcelas;
        $venda->valor = $request->valor;
        $venda->descricao = $request->descricao;
        $venda->status = $request->status;

        $venda->save();

        return redirect("/vendas/$venda->id");  
    }
    
    public function destroy(Venda $venda) 
    {
        $venda->delete();
        return redirect ('/vendas');
    }
}
