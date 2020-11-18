<div class="card">
<div class="card-header"><h4><b>Cadastro de Dependente</b></h4></div>
<hr>
  <div class="card-header"><b>Dados Principais</b></div>
    <div class="card-body">

          <div class="row">

            <div class="col-sm form-group col-sm-6">
              <div class="form-group">
                <label><b>Associado</b></label>
                  <select class="form-control" name="associado_id">
                    @foreach(\App\Models\Associado::all() as $associado)
                      <option value="{{ $associado->id }}">{{ $associado->name }}</option>
                    @endforeach
                  </select>
              </div>
            </div>  

            <div class="col-sm form-group col-sm-6">
                <div class="form-group">
                    <label for="name" class="required"><b>Nome: </b></label>
                    <input type="text" class="form-control" id="name" name="name" value="{{old('name',$dependente->name)}}">
                </div>
            </div>     

          </div>

          <div class="row">

            <div class="col-sm form-group">
                <div class="form-group">
                    <label for="parentesco" class="required"><b>Parentesco: </b></label>
                    <input type="text" class="form-control" id="parentesco" name="parentesco" value="{{old('parentesco',$dependente->parentesco)}}">
                </div>
            </div>    

            <div class="col-sm form-group">
                <div class="form-group">
                    <label for="data_nascimento" class="required"><b>Data de nascimento: </b></label>
                    <input type="text" class="form-control datepicker data" id="data_nascimento" name="data_nascimento" value="{{old('data_nascimento',$dependente->data_nascimento)}}">
                </div>
            </div>  

            <div class="col-sm form-group">
                <div class="form-group">
                    <label for="cpf" class="required"><b>CPF: </b></label>
                    <input type="text" class="form-control" id="cpf" name="cpf" value="{{old('cpf',$dependente->cpf)}}">
                </div>
            </div>

            <div class="col-sm form-group">
                <div class="form-group">
                    <label for="rg" class="required"><b>RG: </b></label>
                    <input type="text" class="form-control" id="rg" name="rg" value="{{old('rg',$dependente->rg)}}">
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
                    <input type="text" class="form-control" id="endereco" name="endereco" value="{{old('endereco',$dependente->endereco)}}">
                </div>
            </div>

            <div class="col-sm form-group col-sm-4">
                <div class="form-group">
                    <label for="complemento" class="required"><b>Complemento: </b></label>
                    <input type="text" class="form-control" id="complemento" name="complemento" value="{{old('complemento',$dependente->complemento)}}">
                </div>
            </div>

        </div>

        <div class="row">

            <div class="col-sm form-group">
                <div class="form-group">
                    <label for="cidade" class="required"><b>Cidade: </b></label>
                    <input type="text" class="form-control" id="cidade" name="cidade" value="{{old('cidade',$dependente->cidade)}}">
                </div>
            </div>

            <div class="col-sm form-group">
                <div class="form-group">
                    <label for="cep" class="required"><b>CEP: </b></label>
                    <input type="text" class="form-control" id="cep" name="cep" value="{{old('cep',$dependente->cep)}}">
                </div>
            </div>

            <div class="col-sm form-group">
                <div class="form-group">
                    <label for="estado" class="required"><b>Estado: </b></label>
                    <input type="text" class="form-control" id="estado" name="estado" value="{{old('estado',$dependente->estado)}}">
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
                    <input type="text" class="form-control" id="comercial" name="comercial" value="{{old('comercial',$dependente->comercial)}}">
                </div>
            </div>

            <div class="col-sm form-group">
                <div class="form-group">
                    <label for="residencial" class="required"><b>Residencial: </b></label>
                    <input type="text" class="form-control" id="residencial" name="residencial" value="{{old('residencial',$dependente->residencial)}}">
                </div>
            </div>

            <div class="col-sm form-group">
                <div class="form-group">
                    <label for="celular" class="required"><b>Celular: </b></label>
                    <input type="text" class="form-control" id="celular" name="celular" value="{{old('celular',$dependente->celular)}}">
                </div>
            </div>

            <div class="col-sm form-group col-sm-6">
                <div class="form-group">
                    <label for="e_mail" class="required"><b>E-mail: </b></label>
                    <input type="text" class="form-control" id="e_mail" name="e_mail" value="{{old('e_mail',$dependente->e_mail)}}">
                </div>
            </div>
        </div>

    </div>
</div>

<hr>

<div class="form-group">
    <button type="submit" class="btn btn-success">Enviar</button>
</div>
