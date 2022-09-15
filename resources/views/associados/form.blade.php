<div class="card">
<div class="card-header"><h4><b>Cadastro de Associado</b></h4></div>
<hr>
  <div class="card-header"><b>Dados Principais</b></div>
    <div class="card-body">

        <div class="row">
            <div class="col-sm form-group col-sm-8">
                <div class="form-group">
                    <label for="name" class="required"><b>Nome: </b></label>
                    <input type="text" class="form-control" id="name" name="name" value="{{old('name',$associado->name)}}">
                </div>
            </div>

            <div class="col-sm form-group">
                <label for="unidade" class="required"><b>Unidade: </b></label>
                    <input type="text" class="form-control" id="unidade" name="unidade" value="{{old('unidade',$associado->unidade)}}">
            </div>

            <div class="col-sm form-group">
                <div class="form-group">
                    <label for="numero_usp" class="required"><b>Número USP: </b></label>
                    <input type="text" class="form-control" id="numero_usp" name="numero_usp" value="{{old('numero_usp',$associado->numero_usp)}}">
                </div>
            </div>
        </div>

          <div class="row">

            <div class="col-sm form-group">
                <div class="form-group">
                    <label for="data_nascimento" class="required"><b>Data de nascimento: </b></label>
                    <input type="text" class="form-control datepicker data" id="data_nascimento" name="data_nascimento" value="{{old('data_nascimento',$associado->data_nascimento)}}">
                </div>
            </div>

            <div class="col-sm form-group">
                <div class="form-group">
                    <label for="cpf" class="required"><b>CPF: </b></label>
                    <input type="text" class="form-control" id="cpf" name="cpf" value="{{old('cpf',$associado->cpf)}}">
                </div>
            </div>

            <div class="col-sm form-group">
                <div class="form-group">
                    <label for="rg" class="required"><b>RG: </b></label>
                    <input type="text" class="form-control" id="rg" name="rg" value="{{old('rg',$associado->rg)}}">
                </div>
            </div>
          </div>
    </div>
</div>

<hr>

<div class="card">
    <div class="card-header"><b>Endereço</b></div>
    <div class="card-body">

        <div class="row">

            <div class="col-sm form-group col-sm-8">
                <div class="form-group">
                    <label for="endereco" class="required"><b>Endereço: </b></label>
                    <input type="text" class="form-control" id="endereco" name="endereco" value="{{old('endereco',$associado->endereco)}}">
                </div>
            </div>

            <div class="col-sm form-group col-sm-4">
                <div class="form-group">
                    <label for="complemento" class="required"><b>Complemento: </b></label>
                    <input type="text" class="form-control" id="complemento" name="complemento" value="{{old('complemento',$associado->complemento)}}">
                </div>
            </div>

        </div>

        <div class="row">

            <div class="col-sm form-group">
                <div class="form-group">
                    <label for="cidade" class="required"><b>Cidade: </b></label>
                    <input type="text" class="form-control" id="cidade" name="cidade" value="{{old('cidade',$associado->cidade)}}">
                </div>
            </div>

            <div class="col-sm form-group">
                <div class="form-group">
                    <label for="cep" class="required"><b>CEP: </b></label>
                    <input type="text" class="form-control" id="cep" name="cep" value="{{old('cep',$associado->cep)}}">
                </div>
            </div>

            <div class="col-sm form-group">
                <div class="form-group">
                    <label for="estado" class="required"><b>Estado: </b></label>
                    <input type="text" class="form-control" id="estado" name="estado" value="{{old('estado',$associado->estado)}}">
                </div>
            </div>

        </div>
    </div>
</div>

<hr>

<div class="card">
    <div class="card-header"><b>Contato</b></div>
    <div class="card-body">

        <div class="row">

            <div class="col-sm form-group">
                <div class="form-group">
                    <label for="comercial" class="required"><b>Comercial: </b></label>
                    <input type="text" class="form-control" id="comercial" name="comercial" value="{{old('comercial',$associado->comercial)}}">
                </div>
            </div>

            <div class="col-sm form-group">
                <div class="form-group">
                    <label for="residencial" class="required"><b>Residencial: </b></label>
                    <input type="text" class="form-control" id="residencial" name="residencial" value="{{old('residencial',$associado->residencial)}}">
                </div>
            </div>

            <div class="col-sm form-group">
                <div class="form-group">
                    <label for="celular" class="required"><b>Celular: </b></label>
                    <input type="text" class="form-control" id="celular" name="celular" value="{{old('celular',$associado->celular)}}">
                </div>
            </div>

            <div class="col-sm form-group col-sm-6">
                <div class="form-group">
                    <label for="e_mail" class="required"><b>E-mail: </b></label>
                    <input type="text" class="form-control" id="e_mail" name="e_mail" value="{{old('e_mail',$associado->e_mail)}}">
                </div>
            </div>
        </div>

    </div>
</div>

<hr>

<div class="card">
    <div class="card-header"><b> Informações Financeiras </b></div>
    <div class="card-body">

        <div class="row">

            <div class="col-sm form-group">
                <div class="form-group">
                    <label for="banco" class="required"><b>Banco: </b></label>
                    <input type="text" class="form-control" id="banco" name="banco" value="{{old('banco',$associado->banco)}}">
                </div>
            </div>

            <div class="col-sm form-group">
                <div class="form-group">
                    <label for="agencia" class="required"><b>Agência: </b></label>
                    <input type="text" class="form-control" id="agencia" name="agencia" value="{{old('agencia',$associado->agencia)}}">
                </div>
            </div>

            <div class="col-sm form-group">
                <div class="form-group">
                    <label for="conta_corrente" class="required"><b>Conta Corrente: </b></label>
                    <input type="text" class="form-control" id="conta_corrente" name="conta_corrente" value="{{old('conta_corrente',$associado->conta_corrente)}}">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header"><b> Crédito FAC </b></div>
    <div class="card-body">
        <div class="row">

            <div class="col-sm form-group">
                <div class="form-group">
                    <label for="banco" class="required"><b>Limite: </b></label>
                    <input type="text" class="form-control" id="limite" name="limite" value="{{ $associado->limite ? (old('limite') ? old('limite') : $associado->limite) : '200' }}">
                </div>
            </div>
        </div>
    </div>
</div>

<hr>

<div class="card">
    <div class="card-header"><b> Nova senha </b></div>
    <div class="card-body">
        <div class="col-sm form-group">
            <div class="form-group">
                <label for="password" class="required"><b>Senha: </b></label>
                <br>
                <small>Deixe este campo em branco para não mudar a senha.</small>
                <input type="password" class="form-control" id="password" name="password">
            </div>
        </div>
    </div>
</div>

<hr>

<div class="form-group">
    <button type="submit" class="btn btn-success">Enviar</button>
</div>
