@extends('main')

@section('content')

@include('alerts')

<!--<a href="/conveniados/create">Cadastrar novo Conveniado</a><br><br>-->

<div class="card">

  <table class="table table-striped">
    <thead>
        <tr> 
          <th><h3>Conveniados</h3></th>
          <th><h3>Ações</h3></th>
        </tr>
    </thead>

    <tbody>
      @foreach ($conveniados as $conveniado)
        <tr>
          <td><a href="/conveniados/{{$conveniado->id}}">{{$conveniado->responsavel}}</a></td>

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