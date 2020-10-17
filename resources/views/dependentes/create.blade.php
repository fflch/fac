@extends('main')

@section('content')

@include('alerts')

<form method="POST" action="/dependentes"> 
@csrf
@include('dependentes.form')
</form>  

@endsection