<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titre');
            $table->string('categorie');
            $table->string('note');
            $table->timestamps();
            $table->integer('emploi_id')->unsigned();
            $table->foreign('emploi_id')->references('id')->on('emplois');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tests');
        Schema::table('tests', function (Blueprint $table) {
          $table->dropForeign(['emploi_id']);
            $table->dropColumn('emploi_id');
            $table->dropForeign(['user_id']);
              $table->dropColumn('user_id');
        });
    }
}
