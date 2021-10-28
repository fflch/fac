@extends('main')

@section('styles')
    <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

@endsection

@section('content')

    @include('alerts')

    <form method="POST" action="/vendas"> 
        @csrf
        @include('vendas.form')
    </form>  

@endsection

@section('javascripts_bottom')
    <script>
        $(document).ready(function() {
            $('.conveniados_select').select2();
            $('.associados_select').select2();
        });
    </script>
@endsection
