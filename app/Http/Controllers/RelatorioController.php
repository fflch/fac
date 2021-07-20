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
    public function conveniados(Request $request)
    {
        $this->authorize('admin');

        // $pdf = PDF::loadView('relatorios.conveniados', [
        //     'conveniado' => $conveniado
        // ]);
        //
        // return $pdf->download('convenidos.pdf');
        
        return view ('relatorios.conveniados');

    }

    public function associados(Request $request)
    {
        $this->authorize('admin');

        // $pdf = PDF::loadView('relatorios.associados', [
        //     'associado' => $associado
        // ]);
        //
        // return $pdf->download('associados.pdf');
        return view ('relatorios.associados');

    }

}
