@extends('main')

@section('content')

@include('alerts')
<div class="card">
    <div class="card-header">
        <a href="/conveniados"><i class="fas fa-chevron-circle-left"></a></i>
        <a href="/conveniados/{{$conveniado->id}}/edit"><i class="far fa-edit"></a></i>
        <!--<h4>Dados Cadastrados<h4>-->
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-sm">            
                <h4>Dados Principais</h4>

                Razão Social: {{ $conveniado->razao_social }}<br>
                Nome Fantasia: {{ $conveniado->nome_fantasia }}<br>
                Endereço: {{ $conveniado->endereco }}<br>
                Complemento: {{ $conveniado->complemento }}<br>
                Cidade: {{ $conveniado->cidade }}<br>
                Estado: {{ $conveniado->estado }}<br>
                Cep: {{ $conveniado->cep }}<br>
                IE: {{ $conveniado->ie }}<br>
                Responsável: {{ $conveniado->responsavel }}<br><br>

                <h4>Contatos</h4>    

                Comercial: {{ $conveniado->comercial }}<br>
                Recado: {{ $conveniado->recado }}<br>
                Celular: {{ $conveniado->celular }}<br>
                Email: {{ $conveniado->e_mail }}<br><br>

                <h4>Informações Financeiras</h4>

                Banco: {{ $conveniado->banco }}<br>
                Agencia: {{ $conveniado->agencia }}<br>
                Conta Corrente: {{ $conveniado->conta_corrente }}<br>
                Máximo de Parcelas: {{ $conveniado->max_parcelas }}<br><br>
            </div>
        </div>
    </div>
</div>

@endsection
