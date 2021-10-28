@extends('main')

@section('content')

  <form method="get" action="/relatorios/conveniados/{{ $conveniado->id }}">
    @include('partials.parcelas-search')
  </form>

  <div class="card">

    <div class="card-header">
      
  	 <h3 class="card-title">{{ $conveniado->nome_fantasia }}</h3>
  	 @if (request()->start_date)
             <div>
  	     <a href="/relatorios/conveniados/pdf/{{$conveniado->id}}?start_date={{ request()->start_date }}
  	       &end_date={{ request()->end_date }}">
                 <i class="fas fa-file-pdf"></i> Exportar Relatório em PDF
  	      </a>
  	    </div>
  	  @else
              <div class="alert alert-warning" role="alert">
                Selecione um período.
  	    </div>
  	  @endif

      <div class="card-body">

        <table class="table">
          <thead>
            <tr class="table-active">
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

      </div>

    </div>

    @if ($parcelas)
      <div class="card-body">
        <table class="table table-striped">
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
                <td>{{ $parcela->datavencto }}</td>
                <td>{{ $parcela->venda->associado->name }}</td>
                <td>R$ {{ $parcela->valor }}</td>
                <td>{{ $parcela->numero }} de {{ $parcela->venda->quantidade_parcelas }}</td>
              </tr>
            </tbody>
          @endforeach
        </table>
      </div>

      <div class="card-body">
        <table class="table">
          <thead>
            <tr class="table-active">
              <th>Total vendido</th>
              <th>Comissão FAC</th>
              <th>Total a pagar</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>R$ {{ number_format( $parcelas->sum('valor_raw'), 2, ',' , '') }}</td>
              <td>R$ {{ number_format( $parcelas->sum('comissao'), 2, ',' , '') }}</td>
              <td>R$ {{ number_format( $parcelas->sum('valor_raw') - $parcelas->sum('comissao'), 2, ',' , '') }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    @endif

  </div>

@endsection
