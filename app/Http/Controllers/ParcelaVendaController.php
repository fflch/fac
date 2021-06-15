<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ParcelaVenda;
use App\Models\Venda;

class ParcelaVendaController extends Controller
{

    public function edit(ParcelaVenda $parcela_venda)
    {
        $this->authorize('admin');

        return view('vendas.parcela_venda_edit',[
            'parcela_venda' => $parcela_venda,
        ]);
    }

    public function update(Request $request, ParcelaVenda $parcela_venda, Venda $venda)
    {
        $this->authorize('admin');
        $parcela_venda->status = $request->status;
        $parcela_venda->update();

        return redirect("/vendas/$venda->id");
    }
}
