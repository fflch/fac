@extends('main')

@section('content')

    @can('conveniado')
        @if ($conveniado)
            <form method="get" action="/vendas">
              @include('vendas.partials.search')
            </form>
            <br>
            @include('conveniados.vendas')
            {{ $vendas->appends(request()->query())->links() }}
        @endif
    @endcan

@endsection
