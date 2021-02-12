<div class="card">
  <table class="table table-striped">
      <thead>
        <tr> 
          <th><h3>Conveiado</h3></th>
          <th><h3>CNPJ</h3></th>
          <th><h3>Banco</h3></th>
          <th><h3>Agência</h3></th>
          <th><h3>Conta Corrente</h3></th>
          <th><h3>Tipo de Comissão</h3></th>
          <th><h3>Comissão</h3></th>
        </tr>
      </thead>

      <tbody>
          <tr>

            <td>{{ $conveniado->nome_fantasia }}</td>
            <td>{{ $conveniado->cnpj }}</td>
            <td>{{ $conveniado->banco }}</td>
            <td>{{ $conveniado->agencia }}</td>
            <td>{{ $conveniado->conta_corrente }}</td>
            <td>{{ $conveniado->tipo_comissao }}</td>
            <td>{{ $conveniado->comissao }}</td>
            
          </tr>      
      </tbody>
  </table>
</div>

<div class="card">
    <ul>
        @foreach ($conveniado->vendas->sortDesc() as $venda)
            <li>
                {{ $venda->id}} - 
                {{ $venda->associado->name }} - 
                {{ $venda->valor}}
                {{ $venda->quantidade_parcelas }} 
            </li>
        @endforeach
    </ul>
</div>
