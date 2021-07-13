<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Venda;
use App\Models\ParcelaVenda;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Models\Conveniado;
use Carbon\Carbon;

class IndexController extends Controller
{

    public function index(Request $request)
    {

        if (Auth::user()) {

            // verifica se usar é um conveniado
            $conveniado = Auth::user()->conveniado();

            if ($conveniado) {
                $vendas = $conveniado->vendas()->paginate(10);
                // índice do conveniado
                return view ('index-conveniado', [
                    'conveniado' => $conveniado,
                    'vendas'     => isset($vendas) ? $vendas : null,
                ]);
            }

            // índice do admin
            // recebe uma array com os meses do ano
            $meses = ParcelaVenda::meses();

            // recebe o mês e ano para query
            if ($request->mes) {
              $mes = $request->mes;
              $ano = $request->ano;
            } else {
              $mes = Carbon::now()->month;
              $ano = Carbon::now()->year;
            }

            // realiza a query
            $parcelas = ParcelaVenda::whereYear('datavencto', $ano)
              ->whereMonth('datavencto', $mes)
              ->paginate(10);

            return view ('index-admin', [
              'parcelas'  => $parcelas,
              'meses'     => $meses,
              'mes'       => $mes,
              'ano'       => $ano,

            ]);
        }
        // índice de qualquer user
        return view ('index');
    }
}
