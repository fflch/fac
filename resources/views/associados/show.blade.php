@extends('main')

@section('content')

<div class="card">
    <div class="card-header">
        <a href="/associados"><i class="fas fa-chevron-circle-left"></a></i>
        <a href="/associados/{{$associado->id}}/edit"><i class="far fa-edit"></a></i>
    </div>

    <div class="card-body">

        <div class="row">

            <div class="col-sm">
                <h4>Dados Principais</h4>

                <a href="/relatorios/associados/pdf/{{ $associado->id }}">Gerar Relatório </a>
                <br>
                <br>
                Unidade: {{ $associado->unidade }}<br>
                Número USP: {{ $associado->numero_usp }}<br>
                Nome: {{ $associado->name }}<br>
                Endereço: {{ $associado->endereco }}<br>
                Complemento: {{ $associado->complemento }}<br>
                Cidade: {{ $associado->cidade }}<br>
                Estado: {{ $associado->estado }}<br>
                Cep: {{ $associado->cep }}<br>
                RG: {{ $associado->rg }}<br>
                CPF: {{ $associado->cpf }}<br>
                Data de Nascimento: {{ $associado->data_nascimento }}<br><br>

                <h4>Contato</h4>

                Comercial: {{ $associado->comercial }}<br>
                Residencial: {{ $associado->residencial }}<br>
                Celular: {{ $associado->celular }}<br>
                Email: {{ $associado->e_mail }}<br><br>

                <h4>Informações Financeiras</h4>

                Banco: {{ $associado->banco }}<br>
                Agencia: {{ $associado->agencia }}<br>
                Conta Corrente: {{ $associado->conta_corrente }}<br><br>

                <h4>Crédito FAC</h4>

                Limite: {{ $associado->limite }}<br><br>

                <!-- Relacionamento entre Venda e Associado. Lista as empresas que o associado fez compra.
                Clicando você vai para o id da venda -->

                <h4>Histórico de compras</h4>
                <ul>
                @foreach ($associado->vendas as $venda)
                    <li>
                        <a href="/vendas/{{$venda->id}}">{{$venda->conveniado->nome_fantasia}}</a> -

                        {{$venda->created_at}}
                    </li>
                @endforeach
                <ul>
            </div>
        </div>
    </div>
</div>

@endsection
