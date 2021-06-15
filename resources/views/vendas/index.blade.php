@extends('main')

@section('content')

<form method="get" action="/vendas">
  @include('vendas.partials.search')
</form>

<br>

<div class="card">

  <table class="table table-striped">
      <thead>
        <tr> 
          <th><h3>Venda por Associado</h3></th>
          <th><h3>Data da venda</h3></th>
          <th><h3>Conveniado</h3></th>
          <th><h3>Ações</h3></th>
        </tr>
      </thead>

      <tbody>
      @foreach ($vendas as $venda)
          <tr>
            <td><a href="/vendas/{{$venda->id}}">{{ $venda->associado->name }}</a></td>
            <td>{{ $venda->data_venda = implode('/',array_reverse(explode('-',$venda->data_venda))) }}</td>
            <td>{{ $venda->conveniado->nome_fantasia }}</td>
            <td>
              
              <form method="POST" action="/vendas/{{ $venda->id }}">
                  @csrf
                  @method('delete')
                  <a href="/vendas/{{$venda->id}}/edit"><i class="far fa-edit"></a></i>
                  <button type="submit" onclick="return confirm('Tem certeza que deseja excluir?');" style="background-color: transparent;border: none;"><i class="far fa-trash-alt" color="#007bff"></i></button>
              </form>

            </td>
          </tr>  
        @endforeach
      </tbody>
  </table>
</div>

{{ $vendas->appends(request()->query())->links() }}
@endsection