<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Experiences extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('experiences', function (Blueprint $table) {
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
      Schema::table('experiences', function (Blueprint $table) {
        $table->dropForeign(['cvs_id']);
        $table->dropColumn('cvs_id');
      });
    }
}
