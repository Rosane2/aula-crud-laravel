<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndicacaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indicacao', function (Blueprint $table) {
            $table->bigIncrements('id')->primary();
            $table->string('nome');
            $table->string('cpf')->unique();
            $table->string('telefone');
            $table->string('email');
            $table->integer('status_id')->secoudary();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('indicacao');
    }
}
