<div class="card">
  <div class="card-body">
    <h4>Dados Principais</h4>

    <label for="unidade">Unidade:</label>
    <input  type="text" name="unidade" value="{{ $associado->unidade }}" id="unidade"><br>

    <label for="numero_usp">Número USP:</label>
    <input type="text" name="numero_usp" value="{{ $associado->numero_usp }}" id="numero_usp"><br>

    <label for="name">Nome:</label>
    <input type="text" name="name" value="{{ $associado->name }}" id="name"><br>

    <label for="endereco">Endereço:</label>
    <input type="text" name="endereco" value="{{ $associado->endereco }}" id="endereco" ><br>

    <label for="complemento">Complemento:</label>
    <input type="text" name="complemento" value="{{ $associado->complemento }}" id="complemento"><br>

    <label for="cidade">Cidade:</label>
    <input type="text" name="cidade" value="{{ $associado->cidade }}" id="cidade"><br>

    <label for="estado">Estado:</label>
    <input type="text" name="estado" value="{{ $associado->estado }}" id="estado"><br>

    <label for="cep">Cep:</label>
    <input type="text" name="cep" value="{{ $associado->cep }}" id="cep"><br>

    <label for="rg">RG:</label>
    <input type="text" name="rg" value="{{ $associado->rg }}" id="rg"><br>

    <label for="cpf">CPF:</label>
    <input type="text" name="cpf" value="{{ $associado->cpf }}" id="cpf"><br>

    <label for="data_nascimento">Data de Nascimento:</label>
    <input type="text" class="datepicker" name="data_nascimento" value="{{ $associado->data_nascimento }}" id="data_nascimento"><br>
    
    <br>
    <h4>Contatos</h4>

    <label for="comercial">Comercial:</label>
    <input type="text" name="comercial" value="{{ $associado->comercial }}" id="comercial"><br>

    <label for="residencial">Residencial:</label>
    <input type="text" name="residencial" value="{{ $associado->residencial }}" id="residencial"><br>

    <label for="celular">Celular:</label>
    <input type="text" name="celular" value="{{ $associado->celular }}" id="celular"><br>

    <label for="e_mail">Email:</label>
    <input type="text" name="e_mail" value="{{ $associado->e_mail }}" id="e_mail"><br>

    <br>
    <h4>Conta Bancária</h4>

    <label for="banco">Banco:</label>
    <input type="text" name="banco" value="{{ $associado->banco }}" id="banco"><br>

    <label for="agencia">Agencia:</label>
    <input type="text" name="agencia" value="{{ $associado->agencia }}" id="agencia"><br>

    <label for="conta_corrente">Conta Corrente:</label>
    <input type="text" name="conta_corrente" value="{{ $associado->conta_corrente }}" id="conta_corrente"><br>

    <br>
    <button type="submit" class="btn btn-success">Enviar</button> 
  </div>
</div>
