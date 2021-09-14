<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Venda;
use App\Models\ParcelaVenda;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Models\Conveniado;
use Carbon\Carbon;
use PDF;

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
            $array_date = self::datavencto($request);

            // query
            $parcelas = ParcelaVenda::whereBetween('datavencto', $array_date)->paginate(10);

            return view ('index-admin', [
              'parcelas'  => $parcelas,
            ]);
        }
        // índice de qualquer user
        return view ('index');
    }

    public function pdf(Request $request)
    {
      $this->authorize('admin');

      // data de vencimento
      $array_date = self::datavencto($request);

      // query
      $parcelas = ParcelaVenda::whereBetween('datavencto', $array_date)->get();

      $pdf = PDF::loadView('pdf.associados', [
          'parcelas'    => $parcelas,
        ])->setPaper('a4', 'landscape');
      return $pdf->download("associados.pdf");
    }

    private function datavencto($request)
    {

      if($request->start_date and $request->end_date) {
        $start_date = Carbon::createFromFormat('d/m/Y', $request->start_date)->format('Y-m-d');
        $end_date = Carbon::createFromFormat('d/m/Y', $request->end_date)->format('Y-m-d');
      } else {
        $start_date = Carbon::now();
        $end_date = $start_date;
      }

      return [$start_date, $end_date];
    }
    
}
