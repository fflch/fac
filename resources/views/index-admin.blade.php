@extends('main')

@section('content')
  @can('admin')
  <div class="card">
    @include('partials.parcelas-search')
    <table class="table table-striped">
      <thead>
          <tr>
            <th><h4>Baixar</h4></th>
            <th><h4>Nome</h4></th>
            <th><h4>Data</h4></th>
            <th><h4>Valor</h4></th>
            <th><h4>Conveniado</h4></th>
            <th><h4>Status</h4></th>
          </tr>
      </thead>
      <tbody>
        @forelse ($parcelas as $parcela)
          <tr>
            <td>
              @can('admin')
                @if( $parcela->status != "Baixado")
                  <form method="POST" action="/parcelaVenda/{{ $parcela->id }}">
                      @csrf
                      @method('patch')
                      <button class="btn btn-primary" onclick="return confirm('Tem certeza que deseja baixar a parcela?');">Baixar parcela</button>
                  </form>
                @endif
              @endcan
            </td>
            <td>{{ $parcela->venda->associado->name }}</td>
            <td>{{ $parcela->datavencto }}</td>
            <td>{{ $parcela->valor }}</td>
            <td>{{ $parcela->venda->conveniado->nome_fantasia }}</td>
            <td>{{ $parcela->status }}</td>
          </tr>
        @empty
          <div class="alert alert-warning" role="alert">
            Nenhuma parcela vence neste período.
          </div>
        @endforelse
      </tbody>
    </table>
  </div>
  @endcan
@endsection
