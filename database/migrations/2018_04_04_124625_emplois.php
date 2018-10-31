<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Emplois extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emplois', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titre');
            $table->string('ville');
            $table->string('salaire');
            $table->string('contrat');
            $table->string('entreprise');
            $table->string('profile');
            $table->string('poste');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('emplois');
        Schema::table('emplois', function (Blueprint $table) {
          $table->dropForeign(['user_id']);
          $table->dropColumn('user_id');
        });
    }
}
