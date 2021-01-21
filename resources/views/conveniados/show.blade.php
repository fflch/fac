@extends('main')

@section('content')

@include('alerts')
<div class="card">
    <div class="card-header">
        <a href="/conveniados"><i class="fas fa-chevron-circle-left"></a></i>
        <a href="/conveniados/{{$conveniado->id}}/edit"><i class="far fa-edit"></a></i>
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
                CNPJ: {{ $conveniado->cnpj }}
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
                Máximo de Parcelas: {{ $conveniado->max_parcelas }}<br>
                Comissão: {{ $conveniado->comissao }}<br>
                Tipo de Comissão: {{ $conveniado->tipo_comissao }}<br><br>

                <!-- Relacionamento entre Venda e Conveniados. Lista o número da venda (id).
                Clicando você vai para o id da venda -->

                <h4>Vendas realizadas</h4>
                @foreach ($conveniado->vendas as $venda)
                    Número da Venda: <a href="/vendas/{{$venda->id}}">{{$venda->id}}</a><br>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection
