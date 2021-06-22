<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Venda;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Models\Conveniado;

class IndexController extends Controller
{

    public function index(Request $request)
    {

        if (Auth::user()) {
           
            $conveniado = Auth::user()->conveniado();

            if ($conveniado) {
                $vendas = $conveniado->vendas()->paginate(10);
            }

            return view ('index', [
                'conveniado' => $conveniado,
                'vendas'     => isset($vendas) ? $vendas : null,
            ]);
        }

        return view ('index');
    }
}
