<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLancamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lancamentos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignId('associado_id')->constrained();
            $table->date('data');
            $table->string('descricao');
            $table->string('debito');
            $table->string('cretido');
            //usuario aqui 
            $table->string('observacoes');
            $table->date('inclusao');
            $table->date('modificacao');
            $table->string('check');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lancamentos');
    }
}
