<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Associado;
use App\Http\Requests\AssociadoRequest;

class AssociadoController extends Controller
{
    public function index(Request $request) 
    {
        #Campo de busca
        if(isset(request()->search)){
            $associados = Associado::where('name','LIKE',"%{$request->search}%")
                         ->orWhere('codpes','LIKE',"%{$request->search}%")->paginate(5);
        }else {
            $associados = Associado::paginate(10);
        }
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
        #Verifica se o conveniado tem uma venda, se tiver não deleta se tiver deixa
        if($associado->vendas->isEmpty()) {
            $associado->delete();
        } else {
            request()->session()->flash('alert-danger',
            'Ação não permitida, pois 
            há vendas cadastradas para esse associado.');
        }

        return redirect ('/associados');
    }
}
