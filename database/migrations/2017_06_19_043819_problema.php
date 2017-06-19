<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Problema extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('problema', function (Blueprint $table) {
            $table->integer('id')->unique();
            $table->string('nombre');
            $table->text('descripcion');
            $table->string('docente');
            $table->boolean('estado');
            $table->string('nombrebase');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('problema');
    }
}
