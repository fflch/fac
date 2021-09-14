@extends('main')

@section('content')

    @can('conveniado')
      <form method="get" action="/vendas">
        @include('vendas.partials.search')
      </form>
      <div class="card-body">
        <a href="/relatorios/conveniados/{{$conveniado->id}}">
          <h5>Ver Relatório</h5>
        </a>
      </div>
      @include('conveniados.vendas')
      {{ $vendas->appends(request()->query())->links() }}
    @endcan

@endsection
