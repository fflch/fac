<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ParcelaVenda;

class ParcelaVendaController extends Controller
{

    public function update(ParcelaVenda $parcelaVenda)
    {
        $this->authorize('admin');
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
}
