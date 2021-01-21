<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Associado extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    
    /* Relacionamento com o Venda (Relação 1 para vários)*/
    public function vendas()
    {
        return $this->hasMany(Venda::class,'associado_id','id');
    }
}
