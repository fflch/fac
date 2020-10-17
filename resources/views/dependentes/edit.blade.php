@extends('main')

@section('content')

@include('alerts')

<form method="POST" action="/dependentes/{{ $dependente->id }}"> 
@csrf
@method('patch')
@include('dependentes.form')
</form>  

@endsection