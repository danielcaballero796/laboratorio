<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Consulta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consulta', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('idproblema');
            $table->string('descripcion');
            $table->text('explicacion');
            $table->text('solucion');
            $table->text('explicsolucion');
            $table->text('solucionalternativa');
            $table->integer('numpracticas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consulta');
    }
}
