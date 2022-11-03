<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ParcelaVenda;

class ParcelaVendaController extends Controller
{
  /* pq essa function?
    public function baixarEmLote(Request $request)
    {
      $this->authorize('admin');

      if ($request->parcelas_id) {
        $parcelas_id = $request->parcelas_id;
        $parcelas = new ParcelaVenda;
        foreach ($parcelas_id as $id) {
          $parcelas = ParcelaVenda::where('id', $id);
        }
        $parcelas = $parcelas->get();

        foreach ($parcelas as $parcela) {
          dd($parcela->valor);
        }
      }
    }
    */

    public function update(ParcelaVenda $parcelaVenda)
    {
        $this->authorize('admin');

        // Verifica se as parcelas anteriores foram baixadas
        $venda = $parcelaVenda->venda;
        $parcelas = $venda->parcelas;
        foreach ($parcelas as $parcela) {
          if ($parcela->status != "Baixado" && $parcela->id < $parcelaVenda->id) {
            request()->session()->flash('alert-danger', 'Não pode ser baixado, pois a parcela anterior não foi baixada.');
            return redirect("/vendas/$parcelaVenda->venda_id");
          }
        }

        $parcelaVenda->status = 'Baixado';
        $parcelaVenda->update();

        request()->session()->flash('alert-success', 'Parcela baixada com sucesso.');
        return redirect("/vendas/$parcelaVenda->venda_id");
    }

    public function baixar_parcelas_em_massa()
    {
        $this->authorize('admin');

        $parcelas = ParcelaVenda::where('status', 'A Vencer')->get();

        foreach($parcelas as $parcela){
          $parcela->fill([
            'status' => 'Baixado'
          ]);

          $parcela->save();

        }
        return back();
    }
}