@extends('main')

@section('content')


<div class="card">
    <div class="card-header">
        <a href="/vendas"><i class="fas fa-chevron-circle-left"></a></i>
        <a href="/vendas/{{$venda->id}}/edit"><i class="far fa-edit"></a></i>
        <!--<h4>Dados Cadastrados<h4>-->
    </div>

    <div class="card-body">


        <div class="row">

            <div class="col-sm"> 
                <h4>Dados da Venda</h4>

                Conveniado: {{ $venda->id_conveniado }}<br>
                Associado: {{ $venda->id_associado }}<br>
                Data da Venda: {{ $venda->data_venda }}<br>
                Quantidade de Parcelas: {{ $venda->quantidade_parcelas }}<br>
                Valor: {{ $venda->valor }}<br>
                Descrição: {{ $venda->descricao }}<br>
                Status: {{ $venda->status }}<br><br>
            </div>
        </div>
    </div>
</div>

@endsection