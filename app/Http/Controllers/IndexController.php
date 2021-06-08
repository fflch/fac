<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\Conveniado;

class IndexController extends Controller
{
    public function index()
    {

        if (Auth::user()) {

            $conveniado = Auth::user()->conveniados()->first();

            if ($conveniado) {
                $vendas = $conveniado->vendas()->get();
            }

            return view ('index', [
                'conveniado' => $conveniado,
                'vendas'     => isset($vendas) ? $vendas : null,
            ]);
        }

        return view ('index');
    }
}
