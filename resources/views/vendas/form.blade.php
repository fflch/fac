<div class="card">
  <div class="card-body">
    <h4>Dados da Venda</h4>

    <label for="id_conveniado">Conveniado:</label>
    <input type="text" name="id_conveniado" value="{{ $venda->id_conveniado }}" id="id_conveniado"><br>

    <label for="id_associado">Associado:</label>
    <input type="text" name="id_associado" value="{{ $venda->id_associado }}" id="id_associado"><br>

    <label for="data_venda">Data da Venda:</label>
    <input type="text" class="datepicker" name="data_venda" value="{{ $venda->data_venda }}" id="data_venda"><br>

    <label for="quantidade_parcelas">Quantidade de Parcelas:</label>
    <input type="text" name="quantidade_parcelas" value="{{ $venda->quantidade_parcelas }}" id="quantidade_parcelas" ><br>

    <label for="valor">Valor:</label>
    <input type="text" name="valor" value="{{ $venda->valor }}" id="valor"><br>

    <label for="descricao">Descrição:</label>
    <input type="text" name="descricao" value="{{ $venda->descricao }}" id="descricao"><br>

    <label for="status">Status:</label><br>
        <input type="radio" id="a_vencer" name="status" value="A Vencer" @if($venda->status == "A Vencer")checked @endif>
        <label for="a_vencer">A Vencer</label><br>
        <input type="radio" id="baixado" name="status" value="Baixado"  @if($venda->status == "Baixado")checked @endif>
        <label for="baixado">Baixado</label><br>
        <input type="radio" id="vencido" name="status" value="Vencido"  @if($venda->status == "Vencido")checked @endif>
        <label for="vencido">Vencido</label><br>
    <br>
    <button type="submit" class="btn btn-success">Enviar</button>
  </div>
</div>