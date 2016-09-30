<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('client');
        Schema::create('client', function(Blueprint $table){
            $table->engine = 'InnoDB';
            $table->increments('id',8);
            $table->string('nom',45);
            $table->string('prenom',45);
            $table->string('paypal',45);
            $table->integer('users_id')->unsigned();
            $table->foreign('users_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::table('client', function(Blueprint $table) {
            $table->dropForeign('client_users_id_foreign');
        });
        Schema::drop('client');
    }
}
