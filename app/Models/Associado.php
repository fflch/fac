<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\User;

class Associado extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    
    // Relacionamento com o Venda (Relação 1 para vários)
    public function vendas()
    {
        return $this->hasMany(Venda::class,'associado_id','id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
