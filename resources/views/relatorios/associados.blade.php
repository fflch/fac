@extends('main')

@section('content')

  @include('partials.parcelas-search')

  foreach ($associados->sortDesc() as $associado)
    <div class="card">

      <div class="card-header">
       <h3>$associado->name</h3>
      </div>
      <div class="card-body">
        foreach ($associado->vendas as $vendas)
        <div class="card-head">
          <h4>Venda $venda->id</h4>
        </div>
        <div class="card-body">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Data</th>
                <th>Conveniado</th>
                <th>Observação</th>
              </tr>
            </thead>

            <tbody>
                  <tr>
                    <td> $venda->data_venda</td>
                    <td> $venda->conveniado->nome_fantasia </td>
                    <td> $venda->observacao</td>
                  </tr>
            </tbody>
          </table>
          <div class="card-header">
            <h4>Parcela a cobrar da venda $venda->id </h4>
          </div>
          <div class="card-body">
            <ul class="list-group">
              <li class="list-group-item">Valor total - $parcela->valor</li>
            </ul>
          </div>
        </div>
        endforeach
      </div>
    </div>
  endforeach
@endsection
