<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Finals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('final', function (Blueprint $table) {
            $table->string('usuario');
            $table->integer('idconsulta');
            $table->integer('id');
            $table->string('sql');
            $table->timestamp('fecha');
            $table->text('resultado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('final');
    }
}
