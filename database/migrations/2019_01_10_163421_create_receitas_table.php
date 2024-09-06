<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receitas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome',255);
            $table->string('descricao',255)->nullable();
            $table->string('palavraschave',255)->nullable();
            $table->date('datapublicacao');
            $table->string('capa',250)->nullable();
            $table->string('duracao',250)->nullable();
            $table->integer('porcoes')->nullable();
            $table->string('nivel',15)->nullable();
            $table->text('ingredientes')->nullable();
            $table->text('modopreparo')->nullable();
            $table->string('slug');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('receitas');
    }
}
