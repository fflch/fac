<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ParcelaVenda;
use App\Http\Requests\ParcelaVendaRequest;

class ParcelaVendaController extends Controller
{
    public function index()
    {
        $parcelas = ParcelaVenda::paginate(10);
        return view ('parcelas.index',[
            'parcelas' => $parcelas
        ]);
    }

    public function create() 
    {
        return view ('parcelas.create',[
            'parcela' => new ParcelaVenda
        ]);
    }

    public function store(ParcelaVendaRequest $request) 
    {
        $validated = $request->validated();
        $validated['datavencto'] = implode('-',array_reverse(explode('/',$request->datavencto)));
        $parcela = ParcelaVenda::create($validated);

        return redirect("/parcelas/$parcela->id");
    }

    public function edit(ParcelaVenda $parcela) 
    {
        $parcela->datavencto = implode('/',array_reverse(explode('-',$parcela->datavencto)));
        return view ('parcelas.edit',[
            'parcela' => $parcela
        ]);
    }

    public function update(ParcelaVendaRequest $request,ParcelaVenda $parcela) 
    {
        $validated = $request->validated();
        $validated['datavencto'] = implode('-',array_reverse(explode('/',$request->datavencto)));
        $parcela->update($validated);
        return redirect("/parcelas/$parcela->id");
    }

    public function show(ParcelaVenda $parcela) 
    {
        $parcela->datavencto = implode('/',array_reverse(explode('-',$parcela->datavencto)));
        return view ('parcelas.show',[
            'parcela' => $parcela
        ]);
    }  

    public function destroy(ParcelaVenda $parcela) 
    {
        $parcela->delete();
        return redirect ('/parcelas');
    }
}
