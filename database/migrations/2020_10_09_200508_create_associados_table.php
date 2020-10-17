<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssociadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('associados', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('unidade');
            $table->string('numero_usp');  
            $table->string('name');
            $table->string('endereco');
            $table->string('complemento');
            $table->string('cidade');
            $table->string('estado');
            $table->string('cep');
            $table->string('rg');
            $table->string('cpf');
            $table->date('data_nascimento');

            $table->string('comercial');
            $table->string('residencial');
            $table->string('celular');
            $table->string('e_mail');

            $table->string('banco');
            $table->string('agencia');
            $table->string('conta_corrente');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('associados');
    }
}
