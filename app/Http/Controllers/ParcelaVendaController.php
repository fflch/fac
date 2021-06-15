<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ParcelaVenda;

class ParcelaVendaController extends Controller
{

    public function update(ParcelaVenda $parcelaVenda)
    {
        $this->authorize('admin');
        $parcelaVenda->status = 'Baixado';
        $parcelaVenda->update();

        return redirect("/vendas/$parcelaVenda->venda_id");
    }
}
