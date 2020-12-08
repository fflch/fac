@extends('main')

@section('content')

@include('alerts')

<form method="POST" action="/parcelas"> 
@csrf
@include('parcelas.form')
</form>  

@endsection