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
            $table->string('endereco')->nullable();
            $table->string('complemento')->nullable();
            $table->string('cidade');
            $table->string('estado');
            $table->string('cep')->nullable();
            $table->string('ie')->nullable();
            $table->string('cnpj')->nullable();
            $table->string('responsavel')->nullable();

            $table->string('comercial')->nullable();
            $table->string('recado')->nullable();
            $table->string('celular')->nullable();
            $table->string('e_mail');

            $table->string('banco');
            $table->string('agencia');
            $table->string('conta_corrente');
            $table->string('tipo_comissao');
            $table->string('comissao');
            $table->string('max_parcelas');

            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
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
