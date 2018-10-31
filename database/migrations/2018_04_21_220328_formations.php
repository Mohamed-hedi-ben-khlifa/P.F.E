<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Formations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('formations', function (Blueprint $table) {
          $table->increments('id');
          $table->string('socite');
          $table->string('titre');
          $table->string('description');
          $table->date('date_d');
          $table->date('date_f');
          $table->timestamps();
          $table->integer('cv_id')->unsigned();
          $table->foreign('cv_id')->references('id')->on('cvs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('formations', function (Blueprint $table) {
        $table->dropForeign(['cv_id']);
        $table->dropColumn('cv_id');
      });
    }
}
