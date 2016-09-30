<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('format');
        Schema::create('format', function(Blueprint $table){
            $table->engine = 'InnoDB';
            $table->increments('id',9);

            $table->string('intitule',100);
            $table->float('tarif');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('format');
    }
}
