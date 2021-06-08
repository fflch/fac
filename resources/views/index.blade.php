@extends('main')

@section('content')

    @can('conveniado')
        @if ($conveniado) 
            @include('conveniados.vendas')
        @endif
    @endcan
    
@endsection