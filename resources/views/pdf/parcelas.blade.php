@extends('laravel-fflch-pdf::main')

@section('content')
  <style>
    #valor {
      text-align: right;
    }

    td {
      padding-right: 5 px;
      padding-left: 5 px;
      padding-top: 5 px;
      padding-bottom: 5 px;
    }

    thead {
      background-color: #dfdacd;
    }

  </style>

  <h3>Parcelas de {{ request()->start_date}} a {{ request()->end_date }}</h3>
  <table width="100%" border="1px">
    <thead>
        <tr>
          <th><h4>NUSP</h4></th>
          <th><h4>Nome</h4></th>
          <th><h4>Banco</h4></th>
          <th><h4>Agência</h4></th>
          <th><h4>Conta-Corrente</h4></th>
          <th><h4>Valor</h4></th>
          <th><h4>Data de Vencimento</h4></th>
          <th><h4>Status</h4></th>
        </tr>
    </thead>
    <tbody>
      @forelse ($parcelas as $parcela)
        <tr>
          <td>{{ $parcela->venda->associado->numero_usp }}</td>
          <td>{{ $parcela->venda->associado->name }}</td>
          <td>{{ $parcela->venda->associado->banco }}</td>
          <td>{{ $parcela->venda->associado->agencia }}</td>
          <td>{{ $parcela->venda->associado->conta_corrente }}</td>
          <td id="valor">R$ {{ $parcela->valor }}</td>
          <td>{{ $parcela->datavencto }}</td>
          <td>{{ $parcela->status }}</td>
        </tr>
      @empty
          Nenhuma parcela vence neste período.
      @endforelse
    </tbody>
  </table>
  @section('footer')
    <h3>Total geral: R$ {{ number_format($parcelas->sum('valor_raw'), 2, ',', '') }}</h3>
  @endsection
@endsection
