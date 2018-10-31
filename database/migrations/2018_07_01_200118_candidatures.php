<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Candidatures extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('candidatures', function (Blueprint $table) {
          $table->increments('id');
          $table->date('date_p');
          $table->string('resultat');
          $table->foreign('user_id')->references('id')->on('users');
          $table->integer('emploi_id')->unsigned();
          $table->foreign('emploi_id')->references('id')->on('emplois');
          $table->integer('test_id')->unsigned();
          $table->foreign('test_id')->references('id')->on('tests');
          $table->rememberToken();
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
      Schema::dropIfExists('candidatures');
      Schema::table('candidatures', function (Blueprint $table) {
      $table->dropForeign(['user_id']);
        $table->dropColumn('user_id');
      });
      Schema::table('candidatures', function (Blueprint $table) {
      $table->dropForeign(['emploi_id']);
        $table->dropColumn('emploi_id');
      });
      Schema::table('candidatures', function (Blueprint $table) {
      $table->dropForeign(['test_id']);
        $table->dropColumn('test_id');
      });
    }
}
