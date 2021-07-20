@extends('main')

@section('content')

  @include('partials.parcelas-search')

  foreach ($conveniados as $conveniado)
    <div class="card">

      <div class="card-header">
       <h3>$conveniado->nome_fantasia</h3>
      </div>
      <div class="card-body">
        <table class="table table-striped">
            <thead>
              <tr>
                <th>CNPJ</th>
                <th>Banco</th>
                <th>Agência</th>
                <th>Conta Corrente</th>
              </tr>
            </thead>
            <tbody>
                <tr>
                  <td> $conveniado->cnpj </td>
                  <td> $conveniado->banco </td>
                  <td> $conveniado->agencia </td>
                  <td> $conveniado->conta_corrente </td>
                </tr>
            </tbody>
        </table>
      </div>

      <div class="card-header">
        <h4>Parcelas a receber</h4>
      </div>
      <div class="card-body">
        <ul class="list-group">
            foreach ($conveniado->vendas->parcelas as $parcela)
                <li class="list-group-item">Associado - $parcela->venda->associado</li>
                <li class="list-group-item">Valor total - $parcela->valor</li>
                <li class="list-group-item">Valor da comissão - $parcela-></li>
                <hr>
            endforeach
        </ul>
      </div>

  </div>
  endforeach
@endsection
