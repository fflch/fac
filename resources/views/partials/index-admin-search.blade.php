<select name="mes" value="{{ request()->mes }}">
  @for ($i = 0; $i < count($meses); $i++)
    <option value="{{ $i + 1 }}" @if ($i + 1 == $mes) selected @endif>{{ $meses[$i] }}</option>
  @endfor
</select>
<select name="ano" value="{{ request()->ano}}">
  @for ($i = $ano - 10; $i <= $ano + 10; $i++)
    <option value="{{ $i }}" @if ($i == $ano) selected @endif>{{ $i }}</option>
  @endfor
</select>
