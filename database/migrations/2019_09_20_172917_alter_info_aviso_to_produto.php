
<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterInfoAvisoToProduto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */


     public function up()
    {
      DB::statement('ALTER TABLE produtos MODIFY infodestaque TEXT NULL;');
      DB::statement('ALTER TABLE produtos MODIFY avisoimportante TEXT NULL;');
    }

   public function down()
   {
      DB::statement('ALTER TABLE produtos MODIFY infodestaque TEXT NULL;');
      DB::statement('ALTER TABLE produtos MODIFY avisoimportante TEXT NULL;');
   }
}
