@extends('main')

@section('content')

@include('alerts')

<div class="card">

  <table class="table table-striped">
      <thead>
        <tr> 
          <th><h3>Status da Parcelas</h3></th>
          <th><h3>Ações</h3></th>
        </tr>
      </thead>

      <tbody>
      @foreach ($parcelas as $parcela)
          <tr>
            <td><a href="/parcelas/{{$parcela->id}}">{{ $parcela->status }}</a></td>
            <td>
              
              <form method="POST" action="/parcelas/{{ $parcela->id }}">
                  @csrf
                  @method('delete')
                  <a href="/parcelas/{{$parcela->id}}/edit"><i class="far fa-edit"></a></i>
                  <button type="submit" onclick="return confirm('Tem certeza que deseja excluir?');" style="background-color: transparent;border: none;"><i class="far fa-trash-alt" color="#007bff"></i></button>
              </form>

            </td>
          </tr>  
        @endforeach
      </tbody>
  </table>
</div>

{{ $parcelas->appends(request()->query())->links() }}
@endsection