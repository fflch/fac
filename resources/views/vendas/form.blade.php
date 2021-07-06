<div class="card">
<div class="card-header"><h4><b>Cadastro de Venda</b></h4></div>
<hr>
  <div class="card-header"><b>Dados da Venda</b></div>
    <div class="card-body">

        <div class="row">
          @if(!$objeto)
              <div class="col-sm form-group col-sm-6">
                <div class="form-group">
                  <label><b>Conveniado: </b></label>
                      <select class="form-control" name="conveniado_id">
                          @foreach(\App\Models\Conveniado::all() as $conveniado)
                            <option value="{{ $conveniado->id }}" @if(old('conveniado_id')== $conveniado->id) {{'selected'}}
                                @else {{($venda->conveniado_id === $conveniado->id ) ? 'selected' : ''}} @endif>
                                  {{ $conveniado->nome_fantasia }}
                            </option>
                          @endforeach
                      </select>
                </div>
              </div>
            @endif

            <div class="col-sm form-group col-sm-6">
              <div class="form-group">
                <label><b>Associado: </b></label>
                  <select class="form-control" name="associado_id">
                    @foreach(\App\Models\Associado::all() as $associado)
                      <option value="{{ $associado->id }}" @if(old('associado_id')== $associado->id) {{'selected'}}
                          @else {{($venda->associado_id === $associado->id ) ? 'selected' : ''}} @endif>
                            {{ $associado->name }}
                      </option>
                    @endforeach
                  </select>
              </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm form-group col-sm-4">
                <div class="form-group">
                    <label for="data_venda" class="required"><b>Data da Venda: </b></label>
                    <input type="text" class="form-control datepicker data" id="data_venda" name="data_venda" value="{{old('data_venda',$venda->data_venda)}}">
                </div>
            </div>

            <div class="col-sm form-group col-sm-4">
                <div class="form-group">
                    <label for="quantidade_parcelas" class="required"><b>Quantidade de Parcelas: </b></label>
                    <input type="text" class="form-control" id="quantidade_parcelas" name="quantidade_parcelas" value="{{old('quantidade_parcelas',$venda->quantidade_parcelas)}}">
                </div>
            </div>

            <div class="col-sm form-group col-sm-4">
                <div class="form-group">
                    <label for="valor" class="required"><b>Valor: </b></label>
                    <input type="text" class="form-control" id="valor" name="valor" value="{{old('valor',$venda->valor)}}">
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-sm form-group">
                <div class="form-group">
                    <label for="descricao" class="required"><b>Descrição: </b></label>
                    <textarea id="descricao" class="form-control" name="descricao" >{{old('descricao', $venda->descricao)}}</textarea><br>
                </div>
            </div>

        </div>
    </div>
</div>

<hr>

<div class="form-group">
    <button type="submit" class="btn btn-success">Enviar</button>
</div>
