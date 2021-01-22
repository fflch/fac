<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conveniado;
use App\Http\Requests\ConveniadoRequest;

class ConveniadoController extends Controller
{
    public function index(Request $request) 
    {
        if(isset(request()->search)){
            $conveniados = Conveniado::where('nome_fantasia','LIKE',"%{$request->search}%")
                         ->orWhere('razao_social','LIKE',"%{$request->search}%")
                         ->orWhere('cnpj','LIKE',"%{$request->search}%")->paginate(5);
        }else{
            $conveniados = Conveniado::paginate(10);
        }
        return view ('conveniados.index', [
            'conveniados' => $conveniados
        ]);
    }
    public function create() 
    {
        return view ('conveniados.create',[
            'conveniado' => new Conveniado
        ]);
    }
    
    public function store(ConveniadoRequest $request) 
    {
        $validated = $request->validated();
        $conveniado = Conveniado::create($validated);

        return redirect("/conveniados/$conveniado->id");
    }

    public function edit(Conveniado $conveniado) 
    {
        return view ('conveniados.edit',[
            'conveniado' => $conveniado
        ]);
    }

    public function update(ConveniadoRequest $request, Conveniado $conveniado)
    {
    
        $validated = $request->validated();
        $conveniado->update($validated);

        return redirect("/conveniados/$conveniado->id");
    }

    public function show(Conveniado $conveniado) 
    {  
        return view ('conveniados.show',[
            'conveniado' => $conveniado
        ]);
    }

    public function destroy(Conveniado $conveniado) 
    {
        if($conveniado->vendas->isEmpty()) {
            $conveniado->delete();
        } else {
            request()->session()->flash('alert-danger',
            $conveniado->nome_fantasia . ' não pode ser deletada pois 
            há vendas cadastradas para essa empresa');
        }
        
        return redirect ('/conveniados');
    }
}
