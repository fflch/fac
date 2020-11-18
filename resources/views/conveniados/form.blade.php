<div class="card">
<div class="card-header"><h4><b>Cadastro de Conveniado</b></h4></div>
<hr>
  <div class="card-header"><b>Dados Principais</b></div>
    <div class="card-body">

        <div class="row">
            <div class="col-sm form-group col-sm-8">
                <div class="form-group">
                    <label for="razao_social" class="required"><b>Razão Social: </b></label>
                    <input type="text" class="form-control" id="razao_social" name="razao_social" value="{{old('razao_social',$conveniado->razao_social)}}">
                </div>
            </div>

            <div class="col-sm form-group">
                <div class="form-group">
                    <label for="ie" class="required"><b>IE: </b></label>
                    <input type="text" class="form-control datepicker data" id="ie" name="ie" value="{{old('ie',$conveniado->ie)}}">
                </div>
            </div> 
        </div>

        <div class="row">
            <div class="col-sm form-group">
                <div class="form-group">
                    <label for="responsavel" class="required"><b>Responsável: </b></label>
                    <input type="text" class="form-control datepicker data" id="responsavel" name="responsavel" value="{{old('responsavel',$conveniado->responsavel)}}">
                </div>
            </div>

            <div class="col-sm form-group">
                <div class="form-group">
                    <label for="nome_fantasia" class="required"><b>Nome Fantasia: </b></label>
                    <input type="text" class="form-control" id="nome_fantasia" name="nome_fantasia" value="{{old('nome_fantasia',$conveniado->nome_fantasia)}}">
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
                    <input type="text" class="form-control" id="endereco" name="endereco" value="{{old('endereco',$conveniado->endereco)}}">
                </div>
            </div>

            <div class="col-sm form-group col-sm-4">
                <div class="form-group">
                    <label for="complemento" class="required"><b>Complemento: </b></label>
                    <input type="text" class="form-control" id="complemento" name="complemento" value="{{old('complemento',$conveniado->complemento)}}">
                </div>
            </div>

        </div>

        <div class="row">

            <div class="col-sm form-group">
                <div class="form-group">
                    <label for="cidade" class="required"><b>Cidade: </b></label>
                    <input type="text" class="form-control" id="cidade" name="cidade" value="{{old('cidade',$conveniado->cidade)}}">
                </div>
            </div>

            <div class="col-sm form-group">
                <div class="form-group">
                    <label for="cep" class="required"><b>CEP: </b></label>
                    <input type="text" class="form-control" id="cep" name="cep" value="{{old('cep',$conveniado->cep)}}">
                </div>
            </div>

            <div class="col-sm form-group">
                <div class="form-group">
                    <label for="estado" class="required"><b>Estado: </b></label>
                    <input type="text" class="form-control" id="estado" name="estado" value="{{old('estado',$conveniado->estado)}}">
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
                    <input type="text" class="form-control" id="comercial" name="comercial" value="{{old('comercial',$conveniado->comercial)}}">
                </div>
            </div>

            <div class="col-sm form-group">
                <div class="form-group">
                    <label for="recado" class="required"><b>Recado: </b></label>
                    <input type="text" class="form-control" id="recado" name="recado" value="{{old('recado',$conveniado->recado)}}">
                </div>
            </div>

            <div class="col-sm form-group">
                <div class="form-group">
                    <label for="celular" class="required"><b>Celular: </b></label>
                    <input type="text" class="form-control" id="celular" name="celular" value="{{old('celular',$conveniado->celular)}}">
                </div>
            </div>

            <div class="col-sm form-group col-sm-6">
                <div class="form-group">
                    <label for="e_mail" class="required"><b>E-mail: </b></label>
                    <input type="text" class="form-control" id="e_mail" name="e_mail" value="{{old('e_mail',$conveniado->e_mail)}}">
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
                    <input type="text" class="form-control" id="banco" name="banco" value="{{old('banco',$conveniado->banco)}}">
                </div>
            </div>

            <div class="col-sm form-group">
                <div class="form-group">
                    <label for="agencia" class="required"><b>Agência: </b></label>
                    <input type="text" class="form-control" id="agencia" name="agencia" value="{{old('agencia',$conveniado->agencia)}}">
                </div>
            </div>

            <div class="col-sm form-group">
                <div class="form-group">
                    <label for="conta_corrente" class="required"><b>Conta Corrente: </b></label>
                    <input type="text" class="form-control" id="conta_corrente" name="conta_corrente" value="{{old('conta_corrente',$conveniado->conta_corrente)}}">
                </div>
            </div>

            <div class="col-sm form-group">
                <div class="form-group">
                    <label for="max_parcelas" class="required"><b>Máximo de Parcelas: </b></label>
                    <input type="text" class="form-control" id="max_parcelas" name="max_parcelas" value="{{old('max_parcelas',$conveniado->max_parcelas)}}">
                </div>
            </div>
        </div>
    </div>
</div>

<hr>

<div class="form-group">
    <button type="submit" class="btn btn-success">Enviar</button>
</div>