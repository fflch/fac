<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ParcelaVenda;
use App\Http\Requests\ParcelaVendaRequest;
use App\Models\Conveniado;
use PDF;

class RelatorioController extends Controller
{

    public function conveniados(Conveniado $conveniado)
    {

        # Mostrar as parcelas desse mês
        $pdf = PDF::loadView('relatorios.conveniados', [
            'conveniado' => $conveniado
        ]);

        return $pdf->download('exemplo.pdf');
    }
}
