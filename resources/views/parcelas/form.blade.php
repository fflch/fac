<div class="card">
<div class="card-header"><h4><b>Cadastro de Parcelas</b></h4></div>
<hr>
  <div class="card-header"><b>Dados da Parcela</b></div>
    <div class="card-body">

        <div class="row">
            <div class="col-sm form-group">
              <div class="form-group">
                <label><b>Número da Venda: </b></label>
                <input type="text" class="form-control" id="venda_id" name="venda_id" value="{{old('venda_id',$parcela->venda_id)}}">
              </div>
            </div> 

            <div class="col-sm form-group">
              <div class="form-group">
                <label><b>Número de Parcelas: </b></label>
                <input type="text" class="form-control" id="numero" name="numero" value="{{old('numero',$parcela->numero)}}">
              </div>
            </div> 

            <div class="col-sm form-group">
                <div class="form-group">
                    <label for="datavencto" class="required"><b>Data de Vencimento: </b></label>
                    <input type="text" class="form-control datepicker data" id="datavencto" name="datavencto" value="{{old('datavencto',$parcela->datavencto)}}">
                </div>
            </div>
        </div>  

        <div class="row">

            <div class="col-sm form-group col-sm-4">
                <div class="form-group">
                    <label for="valor" class="required"><b>Valor: </b></label>
                    <input type="text" class="form-control" id="valor" name="valor" value="{{old('valor',$parcela->valor)}}">
                </div>
            </div>

            <div class="col-sm form-group col-sm-4">
                <div class="form-group">
                  <label for="status"><b>Status: </b></label><br>
                  <input type="radio" id="a_vencer" name="status" value="A Vencer" @if($parcela->status == "A Vencer")checked @else {{ old('status') == 'A Vencer' ? 'checked' : ''}}@endif>
                  <label for="a_vencer">A Vencer</label><br>
                  <input type="radio" id="baixado" name="status" value="Baixado"  @if($parcela->status == "Baixado")checked @else {{ old('status') == 'Baixado' ? 'checked' : ''}}@endif>
                  <label for="baixado">Baixado</label><br>
                  <input type="radio" id="vencido" name="status" value="Vencido"  @if($parcela->status == "Vencido")checked @else {{ old('status') == 'Vencido' ? 'checked' : ''}}@endif>
                  <label for="vencido">Vencido</label><br>
                </div>
            </div>
        </div> 
    </div>
</div>

<hr>

<div class="form-group">
    <button type="submit" class="btn btn-success">Enviar</button>
</div>
