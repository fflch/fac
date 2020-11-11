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
