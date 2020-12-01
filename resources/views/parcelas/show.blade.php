@extends('main')

@section('content')

@inject('replicado','App\Utils\ReplicadoUtils')

<div class="card">
    <div class="card-header">
        <a href="/parcelas"><i class="fas fa-chevron-circle-left"></a></i>
        <a href="/parcelas/{{$parcela->id}}/edit"><i class="far fa-edit"></a></i>
    </div>

    <div class="card-body">
        <div class="row">

            <div class="col-sm"> 
                <h4>Dados da Parcela</h4>
               
                Número da Venda: {{ $parcela->venda_id }} <br>
                Número da Parcela: {{ $parcela->numero }}<br>
                Data de Vencimento: {{ $parcela->datavencto }}<br>
                Valor: {{ $parcela->valor }}<br>
                Status: {{ $parcela->status }}<br><br>
            </div>
        </div>
    </div>
</div>

@endsection