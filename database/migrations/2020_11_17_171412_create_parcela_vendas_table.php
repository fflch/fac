<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParcelaVendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parcela_vendas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('venda_id')->constrained(); //->onDelete('cascade'); deleção em cascata, dado que exclusão de uma venda é permitido
            $table->integer('numero');
            $table->date('datavencto');
            $table->float('valor');
            $table->string('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parcela_vendas');
    }
}
