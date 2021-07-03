<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Venda extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    /* Relacionamento com o Conveniado*/
    public function conveniado(){
        return $this->belongsTo(Conveniado::class,'conveniado_id','id');
    }

    /* Relacionamento com o Associado*/
    public function associado(){
        return $this->belongsTo(Associado::class,'associado_id','id');
    }

    /*Relacionamento com Parcela Venda*/
    public function parcelas(){
        return $this->hasMany(ParcelaVenda::class,'venda_id','id');
    }

    #Edita a formatação da data de criação na relação Venda Conveniado e Associado
    public function getCreatedAtAttribute($value){
        if($value){
            return Carbon::parse($this->attributes['created_at'])->format('d/m/Y - H:i');
        }
    }

    public function getValorAttribute($value){
        if($value){
            return number_format($value, 2, ',', '');
        }
    }

    public function getDataVendaAttribute($value){
        if($value){
            return implode('/',array_reverse(explode('-',$value)));
        }
    }
    public function setDataVendaAttribute($value){
        if($value){
            $this->attributes['data_venda'] = implode('-',array_reverse(explode('/',$value)));
        }
    }

    public function getComissaoAttribute($value){
        if($value){
            return number_format($value, 2, ',', '');
        }
    }

}
