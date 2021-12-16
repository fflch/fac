@extends('main')

@section('content')

@include('alerts')

<form method="get" action="/conveniados">
<div class="row">
    <div class=" col-sm input-group">
    <input type="text" class="form-control" name="search" placeholder="Busca por nome fantasia, razão social ou CNPJ" value="{{ request()->search }}">

    <span class="input-group-btn">
        <button type="submit" class="btn btn-success"> Buscar </button>
    </span>

    </div>
</div>
</form>
<br>

<div class="card">

  <table class="table table-striped">
    <thead>
        <tr>
          <th><h3>Conveniados</h3></th>
        </tr>
        <tr>
          <th><h4>Nome Fantasia</h4></th>
          <th><h4>Razão Social</h4></th>
          <th><h4>CNPJ</h4></th>
          <th><h4>Contatos</h4></th>
          <th><h4>Ação</h4></th>
        </tr>
    </thead>

    <tbody>
      @foreach ($conveniados as $conveniado)
        <tr>
          <td><a href="/conveniados/{{$conveniado->id}}">{{$conveniado->nome_fantasia}}</a></td>
          <td>{{$conveniado->razao_social}}</td>
          <td>{{$conveniado->cnpj}}</td>
          <td>
            Comercial : {{$conveniado->comercial}}<br>
            Recado : {{$conveniado->recado}}<br>
            Celular : {{$conveniado->celular}}<br>
            E-mail : {{$conveniado->e_mail}}<br>
          </td>
          <td>

            <form method="POST" action="/conveniados/{{ $conveniado->id }}">
                @csrf
                @method('delete')
                <a href="/conveniados/{{$conveniado->id}}/edit"><i class="far fa-edit"></a></i>
                <button type="submit" onclick="return confirm('Tem certeza que deseja excluir?');" style="background-color: transparent;border: none;"><i class="far fa-trash-alt" color="#007bff"></i></button>
            </form>
            
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>

{{ $conveniados->appends(request()->query())->links() }}
@endsection
