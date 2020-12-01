<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConveniadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conveniados', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('razao_social');
            $table->string('nome_fantasia');
            $table->string('endereco');
            $table->string('complemento');
            $table->string('cidade');
            $table->string('estado');
            $table->string('cep');
            $table->string('ie');
            $table->string('responsavel'); 

            $table->string('comercial');
            $table->string('recado');
            $table->string('celular');
            $table->string('e_mail');

            $table->string('banco');
            $table->string('agencia');
            $table->string('conta_corrente');
            $table->string('tipo_comissao');
            $table->string('comissao');
            $table->string('max_parcelas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conveniados');
    }
}
