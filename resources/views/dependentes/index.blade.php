@extends('main')

@section('content')

<!--a href="/associados">Menu Associados</a><br><br>-->

<div class="card">

  <table class="table table-striped">
      <thead>
        <tr> 
          <th><h3>Dependentes</h3></th>
          <!--a<th><h3>Associado a</h3></th>-->
          <th><h3>Ações</h3></th>
        </tr>
      </thead>

      <tbody>
      @foreach ($dependentes as $dependente)
          <tr>
            <td><a href="/dependentes/{{$dependente->id}}">{{ $dependente->name }}</a></td>
            <!--a<td>{{ $dependente->associado_id }}</td>-->

            <td>
              
              <form method="POST" action="/dependentes/{{ $dependente->id }}">
                  @csrf
                  @method('delete')
                  <a href="/dependentes/{{$dependente->id}}/edit"><i class="far fa-edit"></a></i>
                  <button type="submit" onclick="return confirm('Tem certeza que deseja excluir?');" style="background-color: transparent;border: none;"><i class="far fa-trash-alt" color="#007bff"></i></button>
              </form>

            </td>
          </tr>  
        @endforeach
      </tbody>
  </table>
</div>

{{ $dependentes->appends(request()->query())->links() }}
@endsection