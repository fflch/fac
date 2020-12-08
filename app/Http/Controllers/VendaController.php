<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venda;
use App\Http\Requests\VendaRequest;

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

    public function store(VendaRequest $request) 
    {
        $validated = $request->validated();
        $validated['data_venda'] = implode('-',array_reverse(explode('/',$request->data_venda)));
        $venda = Venda::create($validated);

        return redirect("/vendas/$venda->id");   
    }

    public function show(Venda $venda) 
    {
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
        $venda->data_venda = implode('/',array_reverse(explode('-',$venda->data_venda)));
        return view ('vendas.edit',[
            'venda' => $venda
        ]);
    }

    public function update(VendaRequest $request, Venda $venda) 
    {
        $validated = $request->validated();
        $validated['data_venda'] = implode('-',array_reverse(explode('/',$request->data_venda)));
        $venda->update($validated);

        return redirect("/vendas/$venda->id");  
    }
    
    public function destroy(Venda $venda) 
    {
        $venda->delete();
        return redirect ('/vendas');
    }
}
