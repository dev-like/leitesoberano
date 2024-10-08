<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSifdipoaToProdutos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('produtos', function (Blueprint $table) {
          $table->string('sifdipoa', 50)->nullable();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('produtos', function (Blueprint $table) {
          $table->string('sifdipoa', 50)->nullable();
      });
    }
}
