<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome',255);
            $table->string('mododepreparo',500)->nullable();
            $table->string('para1litro',500)->nullable();
            $table->string('para200ml',500)->nullable();
            $table->string('infodestaque',255)->nullable();
            $table->string('ingredientes',500)->nullable();
            $table->string('selo',250);
            $table->string('avisoimportante',250);
            $table->string('embalagem',250);

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
        Schema::dropIfExists('produtos');
    }
}
