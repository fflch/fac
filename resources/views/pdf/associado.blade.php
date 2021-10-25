
@extends('laravel-fflch-pdf::main')

@section('content')
  <style>
    #numero {
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

  <h3>{{ $associado->name }}</h3>

  <table width="100%" border="1px">
    <thead>
      <tr>
        <th>NUSP</th>
        <th>CPF</th>
        <th>Banco</th>
        <th>Agência</th>
        <th>Conta Corrente</th>
      </tr>
    </thead>
    <tbody>
        <tr>
          <td id="numero">{{ $associado->numero_usp }}</td>
          <td id="numero">{{ $associado->cpf }}</td>
          <td>{{ $associado->banco }}</td>
          <td id="numero">{{ $associado->agencia }}</td>
          <td id="numero">{{ $associado->conta_corrente }}</td>
        </tr>
     <tbody>
  </table>
  <br>
  <h3>Vendas cadastradas</h3>
  <table width="100%" border="1px">
    <thead>
      <tr>
        <th>Data da venda</th>
        <th>Quantidade de parcelas</th>
        <th>Valor</th>
        <th>Descrição</th>
      </tr>
    </thead>
    @foreach ($vendas as $venda)
      <tbody>
          <tr>
            <td> {{ $venda->data_venda }}</td>
            <td id="numero"> {{ $venda->quantidade_parcelas }}</td>
            <td id="numero">R$ {{ $venda->valor }}</td>
            <td> {{ $venda->descricao }} </td>
          </tr>
      </tbody>
    @endforeach
  </table>
  <br>
  <h3>Total das vendas: R$ {{ number_format($vendas->sum('valor_raw'), 2, ',', '') }}</h3>
@endsection
