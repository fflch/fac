<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDependentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dependentes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('name');
            $table->string('parentesco');
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
            $table->string('e_mail')->nullable();

            $table->foreignId('associado_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dependentes');
    }
}
