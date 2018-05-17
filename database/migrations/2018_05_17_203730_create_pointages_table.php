<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePointagesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pointages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('matricule');
            $table->string('heure');
            $table->boolean('modifier');
            $table->timestamps();
            $table->foreign('matricule')->references('matricule')->on('comptables');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pointages');
    }
}
