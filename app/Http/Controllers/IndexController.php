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

            // índice do admin

            // data de vencimento
            $array_date = self::datavencto($request);

	    // query
	    
	    if ($array_date) {
	   	 $parcelas = ParcelaVenda::whereBetween('datavencto',$array_date)->orderBy('datavencto', 'desc')->paginate(10);

	    } else $parcelas = NULL;
        

        return view ('index-admin', [
            'parcelas'  => $parcelas,
            ]);
	}

        // índice de qualquer user
        return view ('index');
    }

    public function parcelasPdf(Request $request)
    {
      $this->authorize('admin');
      
      // data de vencimento
      $array_date = self::datavencto($request);

      // query

      if ($array_date) {
	      $parcelas = ParcelaVenda::whereBetween('datavencto', $array_date)->get();
      } else $parcelas = NULL;

      $pdf = PDF::loadView('pdf.parcelas', [
          'parcelas'    => $parcelas,
  ])->setPaper('a4', 'landscape');

      return $pdf->download($array_date[0] . "_a_" . $array_date[1] . ".pdf");
    
    }

    private function datavencto($request)
    {

      if($request->start_date and $request->end_date) {
        $start_date = Carbon::createFromFormat('d/m/Y', $request->start_date)->format('Y-m-d');
        $end_date = Carbon::createFromFormat('d/m/Y', $request->end_date)->format('Y-m-d');
      } else {
            return NULL;	
      }

      return [$start_date, $end_date];
    }
}
