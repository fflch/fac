@extends('main')

@section('content')

@include('alerts')

<form method="POST" action="/vendas/{{ $venda->id }}"> 
@csrf
@method('patch')
@include('vendas.form')
</form>  

@endsection