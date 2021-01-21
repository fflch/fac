@extends('main')

@section('content')

<form method="get" action="/associados">
<div class="row">
    <div class=" col-sm input-group">
    <input type="text" class="form-control" name="search" value="{{ request()->search }}">

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
          <th><h3>Associados</h3></th>
          <th><h3>Número USP</h3></th>
          <th><h3>Unidade</h3></th>
          <th><h3>Ações</h3></th>
        </tr>
      </thead>

      <tbody>
        @foreach ($associados as $associado)
          <tr>
            <td><a href="/associados/{{$associado->id}}">{{$associado->name}}</a></td>
            <td><a href="/associados/{{$associado->id}}">{{$associado->codpes}}</a></td>
            <td><a href="/associados/{{$associado->id}}">{{$associado->unidade}}</a></td>
            <td>

              <form method="POST" action="/associados/{{ $associado->id }}">
                  @csrf
                  @method('delete')
                  <a href="/associados/{{$associado->id}}/edit"><i class="far fa-edit"></a></i>
                  <button type="submit" onclick="return confirm('Tem certeza que deseja excluir?');" style="background-color: transparent;border: none;"><i class="far fa-trash-alt" color="#007bff"></i></button>
              </form>

            </td>             
          </tr>
        @endforeach              
      </tbody>
  </table>
</div>

{{ $associados->appends(request()->query())->links() }}
@endsection