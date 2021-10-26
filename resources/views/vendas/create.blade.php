@extends('main')

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection

@section('content')

@include('alerts')

<form method="POST" action="/vendas"> 
@csrf
    @include('vendas.form')
</form>  

@endsection

