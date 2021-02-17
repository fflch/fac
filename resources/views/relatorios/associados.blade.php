<div class="card" >
  <table class="table table-striped" >
      <thead>
        <tr> 
          <th><h3>Data </h3></th>
          <th><h3>Descrição </h3></th>
          <th><h3>Dédito </h3></th>
          <th><h3>Crédito </h3></th>
          <th><h3>Saldo </h3></th>
          <th><h3>Observações </h3></th>
        </tr>
      </thead>

      <tbody>
            @foreach ($associado->vendas->sortDesc() as $venda) 
            <tr>  
                  <td>{{ $venda->data_venda}}</td>
                  <td>{{ $venda->descricao }}</td>
                  <td>{{ $venda->valor}}</td>
                  <td></td>
                  <td></td>
                  <td>Venda {{ $venda->id }} feita em {{ $venda->quantidade_parcelas }} parcela(s)</td>
            </tr>  
            @endforeach 
      </tbody>
  </table>
</div>
