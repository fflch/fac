@extends('main')

@section('content')

@include('alerts')

<form method="POST" action="/conveniados/{{ $conveniado->id }}"> 
@csrf
@method('patch')
@include('conveniados.form')
</form>  

@endsection