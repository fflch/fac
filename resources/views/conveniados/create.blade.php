@extends('main')

@section('content')

@include('alerts')

<form method="POST" action="/conveniados"> 
@csrf
@include('conveniados.form')
</form>  

@endsection