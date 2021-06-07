<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\Conveniado;

class IndexController extends Controller
{
    public function index()
    {
        
        $user = Auth::user();

        if ($user) {
            $conveniado = $user->conveniados()->first();
            
            if ($conveniado) {
                $vendas = $conveniado->vendas()->get();
                return view ('index', [
                    'conveniado' => $conveniado,
                    'vendas'     => $vendas,
                ]);
            }

            return view ('index', [
                'conveniado' => $conveniado,
            ]);
        }

        return view ('index');
    }
}
