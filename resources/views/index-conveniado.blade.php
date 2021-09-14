@extends('main')

@section('content')

    @can('conveniado')
      <form method="get" action="/vendas">
        @include('vendas.partials.search')
      </form>
      <div class="card-body">

      @include('partials.link-relatorio-conveniado')

      </div>
      @include('conveniados.vendas')
      {{ $vendas->appends(request()->query())->links() }}
    @endcan

@endsection
