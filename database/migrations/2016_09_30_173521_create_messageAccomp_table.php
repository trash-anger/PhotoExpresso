<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessageAccompTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('messageaccomp');
        Schema::create('messageaccomp', function(Blueprint $table){
            $table->engine = 'InnoDB';
            $table->increments('id',8);
            $table->text('contenu');

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
        Schema::drop('messageaccomp');
    }
}
