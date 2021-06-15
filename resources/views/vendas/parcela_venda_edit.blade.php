@extends('main')

@section('content')

<form method="POST" action="/parcelaVenda/{{ $parcela_venda->id }}"> 
    @csrf
    @method('patch')
    <div class="card">
        <div class="card-header"><h4><b>Atualizar status da parcela</b></h4></div>
        <div class="card-body">
            <div class="col-sm form-group col-sm-4">
                <div class="form-group">
                    <input type="radio" id="a_vencer" name="status" value="A Vencer" @if($parcela_venda->status == "A Vencer")checked @else {{ old('status') == 'A Vencer' ? 'checked' : ''}}@endif>
                    <label for="a_vencer">A Vencer</label><br>
                    <input type="radio" id="baixado" name="status" value="Baixado"  @if($parcela_venda->status == "Baixado")checked @else {{ old('status') == 'Baixado' ? 'checked' : ''}}@endif>
                    <label for="baixado">Baixado</label><br>
                    <input type="radio" id="vencido" name="status" value="Vencido" @if($parcela_venda->status == "Vencido")checked @else {{ old('status') == 'Vencido' ? 'checked' : ''}}@endif>
                    <label for="vencido">Vencido</label><br>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Enviar</button>
            </div>
        </div>
    </div>
</form>

@endsection