<div class="card">
  <div class="card-body">
    <h4>Dados Principais</h4>

    <label for="associado">Associado:</label>
    <input type="text" name="associado" value="{{ $dependente->associado }}" id="associado"><br>

    <label for="name">Nome:</label>
    <input type="text" name="name" value="{{ $dependente->name }}" id="name"><br>

    <label for="parentesco">Parentesco:</label>
    <input type="text" name="parentesco" value="{{ $dependente->parentesco }}" id="parentesco"><br>

    <label for="endereco">Endereço:</label>
    <input type="text" name="endereco" value="{{ $dependente->endereco }}" id="endereco" ><br>

    <label for="complemento">Complemento:</label>
    <input type="text" name="complemento" value="{{ $dependente->complemento }}" id="complemento"><br>

    <label for="cidade">Cidade:</label>
    <input type="text" name="cidade" value="{{ $dependente->cidade }}" id="cidade"><br>

    <label for="estado">Estado:</label>
    <input type="text" name="estado" value="{{ $dependente->estado }}" id="estado"><br>

    <label for="cep">Cep:</label>
    <input type="text" name="cep" value="{{ $dependente->cep }}" id="cep"><br>

    <label for="rg">RG:</label>
    <input type="text" name="rg" value="{{ $dependente->rg }}" id="rg"><br>

    <label for="cpf">CPF:</label>
    <input type="text" name="cpf" value="{{ $dependente->cpf }}" id="cpf"><br>

    <label for="data_nascimento">Data de Nascimento:</label>
    <input type="text" class="datepicker" name="data_nascimento" value="{{ $dependente->data_nascimento }}" id="data_nascimento"><br>

    <br>
    <h4>Contatos</h4>

    <label for="comercial">Comercial:</label>
    <input type="text" name="comercial" value="{{ $dependente->comercial }}" id="comercial"><br>

    <label for="residencial">Residencial:</label>
    <input type="text" name="residencial" value="{{ $dependente->residencial }}" id="residencial"><br>

    <label for="celular">Celular:</label>
    <input type="text" name="celular" value="{{ $dependente->celular }}" id="celular"><br>

    <label for="e_mail">Email:</label>
    <input type="text" name="e_mail" value="{{ $dependente->e_mail }}" id="e_mail"><br>

    <br>
    <button type="submit" class="btn btn-success">Enviar</button>
  </div>
</div>