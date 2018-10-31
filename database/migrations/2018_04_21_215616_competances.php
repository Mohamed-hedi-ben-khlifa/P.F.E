<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Competances extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('competances', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('p1');
          $table->integer('p2');
          $table->integer('p3');
          $table->integer('p4');
          $table->integer('p5');
          $table->integer('p6');
          $table->integer('p7');
          $table->integer('p8');
          $table->integer('p9');
          $table->integer('p10');
          $table->integer('p11');
          $table->integer('p12');
          $table->string('c1');
          $table->string('c2');
          $table->string('c3');
          $table->string('c4');
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
      Schema::table('competances', function (Blueprint $table) {
        $table->dropForeign(['cv_id']);
        $table->dropColumn('cv_id');
      });
    }
}
