<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ParcelaVenda;
use App\Models\Venda;

class ParcelaVendaController extends Controller
{

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

    public function baixarParcelasEmMassa(ParcelaVenda $parcela)
    {
        $this->authorize('admin');

        ParcelaVenda::where('status', 'A Vencer')
                      ->where('venda_id', $parcela->venda_id)
                      ->update(['status' => 'Baixado']);

        return back();
    }
}
