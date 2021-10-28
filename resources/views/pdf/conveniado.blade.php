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

  <h3>{{ $conveniado->nome_fantasia }}</h3>

  <table width="100%" border="1px">
    <thead>
      <tr>
        <th>CNPJ</th>
        <th>Banco</th>
        <th>Agência</th>
        <th>Conta Corrente</th>
        <th>Tipo de Comissão</th>
        <th>Comissão</th>
      </tr>
    </thead>
    <tbody>
        <tr>
          <td>{{ $conveniado->cnpj }}</td>
          <td>{{ $conveniado->banco }}</td>
          <td>{{ $conveniado->agencia }}</td>
          <td>{{ $conveniado->conta_corrente }}</td>
          <td>{{ $conveniado->tipo_comissao }}</td>
          <td>{{ $conveniado->comissao }}</td>
        </tr>
     <tbody>
  </table>
  <br>
  <h3>Parcelas de {{ request()->start_date }} a {{ request()->end_date }}</h3>
  <table width="100%" border="1px">
    <thead>
      <tr>
        <th>Data de vencimento</th>
        <th>Associado</th>
        <th>Valor</th>
        <th>Parcela</th>
      </tr>
    </thead>
    @foreach ($parcelas as $parcela)
      <tbody>
          <tr>
            <td> {{ $parcela->datavencto }}</td>
            <td> {{ $parcela->venda->associado->name }}</td>
            <td id="valor">R$ {{ $parcela->valor }}</td>
            <td> {{ $parcela->numero }} de {{ $parcela->venda->quantidade_parcelas }}</td>
          </tr>
      </tbody>
    @endforeach
  </table>
  <br>
  <h3>Totais</h3>
  <table width="100%" border="1px">
    <thead>
      <tr>
        <th>Total vendido</th>
        <th>Comissão FAC</th>
        <th>Total a pagar</th>
      </tr>
    </thead>
    <tbody>
        <tr>
          <td>R$ {{ number_format($parcelas->sum('valor_raw'), 2, ',', '') }}</td>
          <td>R$ {{ number_format($parcelas->sum('comissao'), 2, ',', '') }}</td>
          <td>R$ {{ number_format($parcelas->sum('valor_raw') - $parcelas->sum('comissao'), 2, ',', '') }}</td>
        </tr>
     <tbody>
  </table>

@endsection
