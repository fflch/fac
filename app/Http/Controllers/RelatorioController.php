<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ParcelaVenda;
use App\Http\Requests\ParcelaVendaRequest;
use App\Models\Conveniado;
use App\Models\Venda;
use App\Models\Associado;
use PDF;

class RelatorioController extends Controller
{

    public function conveniados(Conveniado $conveniado)
    {

        $pdf = PDF::loadView('relatorios.conveniados', [
            'conveniado' => $conveniado
        ]);

        return $pdf->download('convenidos.pdf');
    }

    public function associados(Venda $venda, Associado $associado)
    {
        #$venda->data_venda = implode('-',array_reverse(explode('/',$venda->data_venda)));

        $pdf = PDF::loadView('relatorios.associados', [
            'associado' => $associado
        ]);

        return $pdf->download('associados.pdf');
    }

}
