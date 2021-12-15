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

    /**
    * Calcula o saldo disponível para o associado.
    * 
    * @return float
    */
    public function saldo()
    {
        $valor_parcelas_abertas = 0;
        foreach ($this->vendas as $venda) {
            foreach ($venda->parcelas as $parcela) {
                if ($parcela->status != "Baixado") {
                    $valor_parcelas_abertas = floatval($valor_parcelas_abertas) + $parcela->valor_raw;
                }
            }
        }
        $saldo = floatval($this->limite) - floatval($valor_parcelas_abertas);
        return round($saldo, 2);
    }
}
