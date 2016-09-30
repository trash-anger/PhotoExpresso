<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCodeReductionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('codereduction');
        Schema::create('codereduction', function(Blueprint $table){
            $table->engine = 'InnoDB';
            $table->increments('id',8);
            $table->string('code',10);
            $table->float('montant');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('codereduction');
    }
}
