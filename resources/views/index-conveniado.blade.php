@extends('main')

@section('content')

    @can('conveniado')
      <form method="get" action="/vendas">
        @include('vendas.partials.search')
      </form>
      <br>
      @include('conveniados.vendas')
      {{ $vendas->appends(request()->query())->links() }}
    @endcan

@endsection
