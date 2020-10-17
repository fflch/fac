@extends('main')

@section('content')

@include('alerts')

<form method="POST" action="/associados/{{ $associado->id }}"> 
@csrf
@method('patch')
@include('associados.form')
</form>  

@endsection