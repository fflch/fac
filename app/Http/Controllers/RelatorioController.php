<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ParcelaVenda;
use App\Http\Requests\ParcelaVendaRequest;
use App\Models\Conveniado;
use App\Models\Venda;
use App\Models\Associado;
use PDF;
use Carbon\Carbon;
use DB;

class RelatorioController extends Controller
{
    public function conveniados(Request $request, $conveniado_id)
    {

        $this->authorize('conveniado.owner', $conveniado_id);
	
	$conveniado = Conveniado::where('id',$conveniado_id)->first();

        $parcelas = self::query($request, $conveniado_id);

        return view ('relatorios.conveniados',[
          'parcelas' => $parcelas,
          'conveniado' => $conveniado,
        ]);

    }

    public function conveniadoPdf(Request $request, $conveniado_id)
    {

      $this->authorize('conveniado.owner', $conveniado_id);

      $conveniado = Conveniado::where('id',$conveniado_id)->first();

      $parcelas = self::query($request, $conveniado_id);

      $pdf = PDF::loadView('pdf.conveniado', [
          'parcelas'    => $parcelas,
          'conveniado'  => $conveniado,
      ])->setPaper('a4', 'landscape');
      return $pdf->download($conveniado->nome_fantasia . "conveniado.pdf");

    }
    
    public function associadoPdf(Request $request, $associado_id)
    {

      // $this->authorize('associado.owner', $conveniado_id);

      $associado = Associado::where('id',$associado_id)->first();

      $vendas = $associado->vendas;
 
      $pdf = PDF::loadView('pdf.associado', [
          'vendas'    => $vendas,
          'associado'  => $associado,
      ])->setPaper('a4', 'landscape');
      return $pdf->download($associado->name . ".pdf");

    }

    private function query($request, $conveniado_id)
    {

      // data de vencimento
      if ($request->start_date and $request->end_date) {
        $start_date = Carbon::createFromFormat('d/m/Y', $request->start_date)->format('Y-m-d');
        $end_date = Carbon::createFromFormat('d/m/Y', $request->end_date)->format('Y-m-d');

        // filtro para Conveniado
        $parcelas = DB::table('parcela_vendas')
        ->select('parcela_vendas.id')
        ->join('vendas', 'parcela_vendas.venda_id', '=', 'vendas.id')
        ->where('conveniado_id', $conveniado_id)
        ->whereBetween('datavencto', [$start_date, $end_date])->get();

        $parcelas = ParcelaVenda::whereIn('id', $parcelas->pluck('id'))->get();

        
        } else {

	    $parcelas = NULL;
	
	}
      
        return $parcelas;
    }
}
