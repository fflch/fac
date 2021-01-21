<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        return $this->hasOne(ParcelaVenda::class,'venda_id','id');
    }
}
