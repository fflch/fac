<div class="card">
  <div class="card-body">
    <h4>Dados Principais</h4>

    <label for="razao_social">Razão Social</label>
    <input type="text" name="razao_social" value="{{ $conveniado->razao_social }}" id="razao_social"><br>

    <label for="nome_fantasia">Nome Fantasia:</label>
    <input type="text" name="nome_fantasia" value="{{ $conveniado->nome_fantasia }}" id="nome_fantasia"><br>

    <label for="endereco">Endereço:</label>
    <input type="text" name="endereco" value="{{ $conveniado->endereco }}" id="endereco"><br>

    <label for="complemento">Complemento:</label>
    <input type="text" name="complemento" value="{{ $conveniado->complemento }}" id="complemento"><br>

    <label for="cidade">Cidade:</label>
    <input type="text" name="cidade" value="{{ $conveniado->cidade }}" id="cidade"><br>

    <label for="estado">Estado:</label>
    <input type="text" name="estado" value="{{ $conveniado->estado }}" id="estado"><br>

    <label for="cep">Cep:</label>
    <input type="text" name="cep" value="{{ $conveniado->cep }}" id="cep"><br>

    <label for="ie">IE:</label>
    <input type="text" name="ie" value="{{ $conveniado->ie }}" id="endereco"><br>

    <label for="responsavel">Responsável:</label>
    <input type="text" name="responsavel" value="{{ $conveniado->responsavel }}" id="responsavel"><br>

    <br>
    <h4>Contatos</h4>

    <label for="comercial">Comercial:</label>
    <input type="text" name="comercial" value="{{ $conveniado->comercial }}" id="comercial"><br>

    <label for="recado">Recado:</label>
    <input type="text" name="recado" value="{{ $conveniado->recado }}" id="recado"><br>

    <label for="celular">Celular:</label>
    <input type="text" name="celular" value="{{ $conveniado->celular }}" id="celular"><br>
    
    <label for="e_mail">Email:</label>
    <input type="text" name="e_mail" value="{{ $conveniado->e_mail }}" id="e_mail"><br>

    <br>
    <h4>Conta Bancária</h4>

    <label for="banco">Banco:</label>
    <input type="text" name="banco" value="{{ $conveniado->banco }}" id="banco"><br>

    <label for="agencia">Agencia:</label>
    <input type="text" name="agencia" value="{{ $conveniado->agencia }}" id="agencia"><br>

    <label for="conta_corrente">Conta Corrente:</label>
    <input type="text" name="conta_corrente" value="{{ $conveniado->conta_corrente }}" id="conta_corrente"><br>

    <label for="max_parcelas">Máximo de Parcelas:</label>
    <input type="text" name="max_parcelas" value="{{ $conveniado->max_parcelas }}" id="max_parcelas"><br>
    <br>
    <button type="submit" class="btn btn-success">Enviar</button>
  </div>
</div>