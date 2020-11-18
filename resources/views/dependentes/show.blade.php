@extends('main')

@section('content')


<div class="card">
    <div class="card-header">
        <a href="/dependentes"><i class="fas fa-chevron-circle-left"></a></i>
        <a href="/dependentes/{{$dependente->id}}/edit"><i class="far fa-edit"></a></i>
        <!--<h4>Dados Cadastrados<h4>-->
    </div>

    <div class="card-body">


        <div class="row">

            <div class="col-sm"> 
                <h4>Dados Principais</h4>

                Associado: {{ $dependente->associado_id }}<br>
                Nome: {{ $dependente->name }}<br>
                Parentesco: {{ $dependente->parentesco }}<br>
                Endereço: {{ $dependente->endereco }}<br>
                Complemento: {{ $dependente->complemento }}<br>
                Cidade: {{ $dependente->cidade }}<br>
                Estado: {{ $dependente->estado }}<br>
                Cep: {{ $dependente->cep }}<br>
                RG: {{ $dependente->rg }}<br>
                CPF: {{ $dependente->cpf }}<br>
                Data de Nascimento: {{ $dependente->data_nascimento }}<br><br>

                <h4>Contatos</h4>    

                Comercial: {{ $dependente->comercial }}<br>
                Residencial: {{ $dependente->residencial }}<br>
                Celular: {{ $dependente->celular }}<br>
                Email: {{ $dependente->e_mail }}<br><br>
            </div>
        </div>
    </div>
</div>

@endsection