<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Associado;
use App\Http\Requests\AssociadoRequest;


class AssociadoController extends Controller
{
    public function index() 
    {

        $associados = Associado::paginate(10);
        return view ('associados.index',[
            'associados' => $associados
        ]);
    }

    public function create() 
    {
        return view ('associados.create',[
            'associado' => new Associado
        ]);
    }

    public function store(AssociadoRequest $request) 
    {
        $validated = $request->validated();
        $validated['data_nascimento'] = implode('-',array_reverse(explode('/',$request->data_nascimento)));
        $associado = Associado::create($validated);

        return redirect("/associados/$associado->id");
    }

    public function edit(Associado $associado) 
    {
        $associado->data_nascimento = implode('/',array_reverse(explode('-',$associado->data_nascimento)));
        return view ('associados.edit',[
            'associado' => $associado
        ]);
    }

    public function update(AssociadoRequest $request,Associado $associado) 
    {
        $validated = $request->validated();
        $validated['data_nascimento'] = implode('-',array_reverse(explode('/',$request->data_nascimento)));
        $associado->update($validated);
        return redirect("/associados/$associado->id");
    }

    public function show(Associado $associado) 
    {
        $associado->data_nascimento = implode('/',array_reverse(explode('-',$associado->data_nascimento)));
        return view ('associados.show',[
            'associado' => $associado
        ]);
    }  

    public function destroy(Associado $associado) 
    {
        $associado->delete();
        return redirect ('/associados');
    }
}
