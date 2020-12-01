@extends('main')

@section('content')

@include('alerts')

<form method="POST" action="/parcelas/{{ $parcela->id }}"> 
@csrf
@method('patch')
@include('parcelas.form')
</form>  

@endsection