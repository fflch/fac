<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conveniado;
use App\Http\Requests\ConveniadoRequest;

class ConveniadoController extends Controller
{
    public function index() 
    {
        $conveniados = Conveniado::paginate(10);
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
        $conveniado->delete();
        return redirect ('/conveniados');
    }
}
