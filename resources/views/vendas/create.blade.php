@extends('main')

@section('content')

@include('alerts')

<form method="POST" action="/vendas"> 
@csrf
@include('vendas.form')
</form>  

@endsection