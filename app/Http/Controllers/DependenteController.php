<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dependente;
use App\Http\Requests\DependenteRequest;


class DependenteController extends Controller
{
    public function index()
    {
        $dependentes = Dependente::paginate(10);
        return view ('dependentes.index',[
            'dependentes' => $dependentes
        ]);
    }

    public function create()
    {
        return view ('dependentes.create',[
            'dependente' => new Dependente
        ]);
    }
    
    public function store(DependenteRequest $request) 
    {
        $validated = $request->validated();
        $validated['data_nascimento'] = implode('-',array_reverse(explode('/',$request->data_nascimento)));
        $dependente = Dependente::create($validated);

        return redirect("/dependentes/$dependente->id");
    }

    public function edit(Dependente $dependente)
    {
        $dependente->data_nascimento = implode('/',array_reverse(explode('-',$dependente->data_nascimento)));
        return view ('dependentes.edit',[
            'dependente' => $dependente
        ]);
    }

    public function update(DependenteRequest $request, Dependente $dependente)
    {
        $validated = $request->validated();
        $validated['data_nascimento'] = implode('-',array_reverse(explode('/',$request->data_nascimento)));
        $dependente->update($validated);

        return redirect("/dependentes/$dependente->id");
    }

    public function show(Dependente $dependente) 
    {
        $dependente->data_nascimento = implode('/',array_reverse(explode('-',$dependente->data_nascimento)));
        return view ('dependentes.show',[
            'dependente' => $dependente
        ]);
    }

    public function destroy(Dependente $dependente) 
    {
        $dependente->delete();
        return redirect ('/dependentes');
    }
}

