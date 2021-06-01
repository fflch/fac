<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conveniado;
use App\Models\User;
use App\Http\Requests\ConveniadoRequest;

class ConveniadoController extends Controller
{
    public function index(Request $request) 
    {   
        $this->authorize('admin');
        #Campo de busca
        if(isset(request()->search)){
            $conveniados = Conveniado::where('nome_fantasia','LIKE',"%{$request->search}%")
                         ->orWhere('razao_social','LIKE',"%{$request->search}%")
                         ->orWhere('cnpj','LIKE',"%{$request->search}%")->paginate(5);
        }else{
            $conveniados = Conveniado::paginate(10);
        }
        return view ('conveniados.index', [
            'conveniados' => $conveniados,
        ]);
    }
    public function create() 
    {
        $this->authorize('admin');
        return view ('conveniados.create',[
            'conveniado' => new Conveniado,
            /* 'user' => new User, */
        ]);
    }
    
    public function store(ConveniadoRequest $request) 
    {
        $this->authorize('admin');
        $validated = $request->validated();

        $user = new User;
        $user->email = $request->e_mail;
        $user->name = $request->razao_social;
        $user->password = $request->razao_social;
        $user->save();

        $conveniado = $validated;
        $conveniado = Conveniado::create($validated);
        /* $conveniado->user_id = $user->id; */     

        return redirect("/conveniados/$conveniado->id");
    }

    public function edit(Conveniado $conveniado) 
    {
        $this->authorize('admin');
        return view ('conveniados.edit',[
            'conveniado' => $conveniado
        ]);
    }

    public function update(ConveniadoRequest $request, Conveniado $conveniado)
    {
        $this->authorize('admin');
        $validated = $request->validated();
        $conveniado->update($validated);

        return redirect("/conveniados/$conveniado->id");
    }

    public function show(Conveniado $conveniado) 
    {  
        $this->authorize('admin');
        return view ('conveniados.show',[
            'conveniado' => $conveniado
        ]);
    }

    public function destroy(Conveniado $conveniado) 
    {   
        $this->authorize('admin');
        #Verifica se o conveniado tem uma venda, se tiver não deleta se tiver deixa
        if($conveniado->vendas->isEmpty()) {
            $conveniado->delete();
        } else {
            request()->session()->flash('alert-danger',
            $conveniado->nome_fantasia . ' não pode ser deletado, pois 
            há vendas cadastradas para essa empresa.');
        }
        
        return redirect ('/conveniados');
    }
}
