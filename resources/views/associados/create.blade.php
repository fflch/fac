@extends('main')

@section('content')

@include('alerts')

<form method="POST" action="/associados"> 
@csrf
@include('associados.form')
</form>  

@endsection