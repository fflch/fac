@extends('main')

@section('javascripts_head')
<script type="text/javascript" src="{{ asset('js/conveniados.js') }}"></script>
@endsection

@section('content')

@include('alerts')

<form method="POST" action="/conveniados"> 
@csrf
@include('conveniados.form')
</form>  

@endsection