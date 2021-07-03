@extends('main')

@section('content')

@include('alerts')
@inject('replicado','App\Utils\ReplicadoUtils')

<div class="card">

    <div class="card-header">
        @can('admin')
            <a href="/vendas"><i class="fas fa-chevron-circle-left"></a></i>
            <a href="/vendas/{{$venda->id}}/edit"><i class="far fa-edit"></a></i>
        @endcan
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
                Parcelas:

            </div>
        </div>

        <ul class="list-group">
        @foreach($venda->parcelas as $parcela)
            <li class="list-group-item" style="display: flex; justify-content: space-between;">
                R$ {{ $parcela->valor }} - {{ $parcela->datavencto }} - {{ $parcela->status }}
                @can('admin')
                  @if( $parcela->status != "Baixado") 
                    <form method="POST" action="/parcelaVenda/{{ $parcela->id }}">
                        @csrf
                        @method('patch')
                        <button class="btn btn-primary" onclick="return confirm('Tem certeza que deseja baixar a parcela?');">Baixar parcela</button>
                    </form>
                  @endif
                @endcan
            </li>
        @endforeach
        </ul>
    </div>
</div>

@endsection
