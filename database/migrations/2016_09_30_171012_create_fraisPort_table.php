<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFraisPortTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('fraisport');
        Schema::create('fraisport', function(Blueprint $table){
            $table->engine = 'InnoDB';
            $table->increments('id',4);
            $table->string('intitule',100);
            $table->float('prix');

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
        Schema::drop('fraisport');
    }
}
