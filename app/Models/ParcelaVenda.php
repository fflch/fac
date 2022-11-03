<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class ParcelaVenda extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $fillable = ['status'];

    const STATUS = [
        'A Vencer',
        'Baixado',
        'Vencido'
    ];

    public function venda()
    {
        return $this->belongsTo(Venda::class);
    }

    public function setValorAttribute($value){
        if($value){
            $this->attributes['valor'] = str_replace(',','.',$value);
        }
    }

    public function getValorRawAttribute(){
        if($this->valor){
            return (float) str_replace(',','.',$this->valor);
        }
    }

    // cópia
    public function getValorAttribute($value){
        if($value){
            return number_format($value, 2, ',', '');
        }
    }

    public function getDatavenctoAttribute($value){
        if($value){
            return  Carbon::parse($this->attributes['datavencto'])->format('d/m/Y');
        }
    }

    public function getStatusAttribute($value){
        if($value){
            $data_vencimento = Carbon::parse($this->attributes['datavencto']);
            $hoje = Carbon::now();
            if($hoje->gt($data_vencimento) && $value == "A Vencer") {
                return 'Vencido';
            } else return $value;
        }
    }

    public static function meses(){
      return [
        'Janeiro',
        'Fevereiro',
        'Março',
        'Abril',
        'Maio',
        'Junho',
        'Julho',
        'Agosto',
        'Setembro',
        'Outubro',
        'Novembro',
        'Dezembro',
      ];
    }
}
