<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdresseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('adresse');
        Schema::create('adresse', function(Blueprint $table){
            $table->engine = 'InnoDB';
            $table->increments('id',9);
            $table->string('intitule',100);
            $table->string('adresse1',100);
            $table->string('adresse2',100);
            $table->string('codePostal',10);
            $table->string('ville',45);
            $table->string('pays',45);
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
        Schema::table('adresse', function(Blueprint $table) {
            $table->dropForeign('adresse_users_id_foreign');
        });
        Schema::drop('adresse');
    }
}
