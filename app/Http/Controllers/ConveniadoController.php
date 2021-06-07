<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Conveniado;
use App\Models\User;
use App\Http\Requests\ConveniadoRequest;

class ConveniadoController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('admin');

        // Campo de busca
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
        ]);
    }

    public function store(ConveniadoRequest $request)
    {
        $this->authorize('admin');

        // Inicia o Database Transaction
        DB::beginTransaction();
        
        $user = User::create([
            'email'     => $request->e_mail,
            'name'      => $request->razao_social,
            'password'  => bcrypt($request->password)

        ]);
        
        $validated = $request->validated();
        $validated['user_id'] = $user->id;
        $conveniado = Conveniado::create($validated);

        if( $conveniado && $user ) {
            // Sucesso!
            DB::commit();
        } else {
            // Fail, desfaz as alterações no banco de dados
            DB::rollBack();
        }

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

        try {

            DB::beginTransaction();

            $user = User::where('id',$conveniado->user_id)->first();
            $user->email = $request->e_mail;
            $user->name = $request->razao_social;
            $user->password = bcrypt($request->password);
            $user->update();
    
            $conveniado->update($request->validated());
            
            DB::commit();

        }catch(Exception $e){

            dd("Exceção capturada: ",  $e->getMessage());
            DB::rollback();
        };

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

        // Verifica se o conveniado tem uma venda, se tiver não deleta se tiver deixa
        if($conveniado->vendas->isEmpty()) {

            // deveria ter uma transaction aqui

            $conveniado->delete();
            $user = User::where('id',$conveniado->user_id)->first();
            $user->delete();

        } else {
            request()->session()->flash('alert-danger',
            $conveniado->nome_fantasia . ' não pode ser deletado, pois
            há vendas cadastradas para essa empresa.');
        }

        return redirect ('/conveniados');
    }

}
