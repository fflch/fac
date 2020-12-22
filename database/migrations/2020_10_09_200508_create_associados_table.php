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

            $table->string('unidade')->nullable();
            $table->string('numero_usp');  // codpes
            $table->string('name');
            $table->string('endereco')->nullable();
            $table->string('complemento')->nullable();
            $table->string('cidade');
            $table->string('estado');
            $table->string('cep')->nullable();
            $table->string('rg')->nullable();
            $table->string('cpf')->nullable();
            $table->date('data_nascimento');

            $table->string('comercial')->nullable();
            $table->string('residencial')->nullable();
            $table->string('celular')->nullable();
            $table->string('e_mail');

            $table->string('banco');
            $table->string('agencia');
            $table->string('conta_corrente');

            $table->string('saldo')->nullable();
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
