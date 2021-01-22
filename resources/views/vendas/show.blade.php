@extends('main')

@section('content')

@inject('replicado','App\Utils\ReplicadoUtils')

<div class="card">
    <div class="card-header">
        <a href="/vendas"><i class="fas fa-chevron-circle-left"></a></i>
        <a href="/vendas/{{$venda->id}}/edit"><i class="far fa-edit"></a></i>
    </div>

    <div class="card-body">


        <div class="row">

            <div class="col-sm"> 
                <h4>Dados da Venda</h4>
               
                Conveniado: {{ $venda->conveniado->nome_fantasia }} <br>
                Associado: {{ $venda->associado->name }}<br>
                Data da Venda: {{ $venda->data_venda }}<br>
                Quantidade de Parcelas: {{ $venda->quantidade_parcelas }}<br>
                Valor: {{ $venda->valor }}<br>
                Descrição: {{ $venda->descricao }}<br>
                Status: {{ $venda->status }}<br><br>
                
            </div>
        </div>

        <ul>
        @foreach($venda->parcelas as $parcela)
            <li>R$ {{ $parcela->valor }} - {{ $parcela->datavencto }} - {{ $parcela->status }}</li>
        @endforeach
        </ul>
    </div>
</div>

@endsection