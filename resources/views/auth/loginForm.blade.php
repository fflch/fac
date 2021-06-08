@extends('main')
@section('content')
    @include('alerts')
    <form method="GET" action="/localLogin">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="form-group row">
                    <label for="email" class="col-sm-4 col-form-label text-md-right">E-mail</label>
                    <div class="col-md-6">
                        <input type="text" name="email" value="{{ old('email') }}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">Senha</label>
                    <div class="col-md-6">
                        <input type="password" name="password" required>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">Entrar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection