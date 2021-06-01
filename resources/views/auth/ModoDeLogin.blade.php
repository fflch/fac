@extends('main')

@section('content')

<div class="container" id="container-login">
    <div class="card">
        <div class="card-header">
            <h3><b>Selecione o tipo de login</b></h3>
        </div>
        <div class="card-body">
            <form method="GET" action="/redirectToProvider">
                @csrf
                <div class="form-check">
                    <input class="form-check-input" name="loginType" type="radio" value="senhaUnica" id="flexCheckSenhaUnica">
                    <label class="form-check-label" for="flexCheckSenhaUnica">
                        Senha Única USP
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" name="loginType" type="radio" value="conveniado" id="flexCheckConveniado">
                    <label class="form-check-label" for="flexCheckConveniado">
                        Conveniado
                    </label>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Entrar</button>
            </form>
        </div>
    </div>
</div>


@endsection