<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommandeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('commande');
        Schema::create('commande', function(Blueprint $table){
            $table->engine = 'InnoDB';

            $table->increments('id',9);
            $table->string('num',10);
            $table->dateTime('date');
            $table->integer('quantite');
            $table->string('statut',10);
            $table->integer('photo_id')->unsigned();
            $table->integer('format_id')->unsigned();
            $table->integer('users_id')->unsigned();
            $table->integer('messageaccomp_id')->unsigned();
            $table->foreign('photo_id')->references('id')->on('photo')->onUpdate('cascade');
            $table->foreign('format_id')->references('id')->on('format')->onUpdate('cascade');
            $table->foreign('messageaccomp_id')->references('id')->on('messageAccomp');
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
        Schema::table('commande', function(Blueprint $table) {
            $table->dropForeign('commande_photo_id_foreign');
            $table->dropForeign('commande_format_id_foreign');
            $table->dropForeign('commande_messageaccomp_id_foreign');
            $table->dropForeign('commande_users_id_foreign');
        });
        Schema::drop('commande');
    }
}
