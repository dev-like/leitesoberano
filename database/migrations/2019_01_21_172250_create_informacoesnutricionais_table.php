<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformacoesNutricionaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informacoesnutricionais', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descricao',255);
            $table->string('quantidade',500);
            $table->decimal('vd',5,2)->nullable();
            $table->integer('produtos_id')->unsigned();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('produtos_id')->references('id')->on('produtos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos');
    }
}
