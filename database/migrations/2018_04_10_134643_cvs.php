<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Cvs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cvs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->string('email');
            $table->string('description');
            $table->string('telephone',8);
            $table->string('ville');
            $table->timestamps();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('emploi_id')->unsigned();
            $table->foreign('emploi_id')->references('id')->on('emplois');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cvs');
        Schema::table('cvs', function (Blueprint $table) {
        $table->dropForeign(['user_id']);
          $table->dropColumn('user_id');
        });
        Schema::table('cvs', function (Blueprint $table) {
        $table->dropForeign(['emploi_id']);
          $table->dropColumn('emploi_id');
        });
    }
  }
