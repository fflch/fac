<div class="card">

  <table class="table table-striped">
    <thead>
        <tr>
          <th><h3>Vendas de {{ $conveniado->nome_fantasia }}</h3></th>
        </tr>
        <tr>
          <th><h4>Nome</h4></th>
          <th><h4>Data da venda</h4></th>
          <th><h4>Quantidade de parcelas</h4></th>
          <th><h4>Valor</h4></th>
          <th><h4>Comissão</h4></th>
          <th><h4>Descrição</h4></th>
          <th><h4>Status</h4></th>
        </tr>
    </thead>

    <tbody>
        @foreach ($vendas as $venda)
        <tr>
          <td><a href="/vendas/{{$venda->id}}">{{$venda->associado->name}}</a></td>
          <td>{{ $venda->data_venda }}</td>
          <td>{{$venda->quantidade_parcelas}}</td>
          <td>{{$venda->valor}}</td>
          <td>{{$venda->comissao}}</td>
          <td>{{$venda->descricao}}</td>
          <td>{{$venda->status}}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
