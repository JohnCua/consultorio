<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePruebasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pruebas', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('idpaci')->unsigned();
            $table->foreign('idpaci')->references('id')->on('pacientes');

            $table->integer('idana')->unsigned();
            $table->foreign('idana')->references('id')->on('analisis');

            $table->integer('iddoc')->unsigned();
            $table->foreign('iddoc')->references('id')->on('doctors');

            $table->string('resultado',50)->nullable();
            $table->date('fecha');

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
        Schema::dropIfExists('pruebas');
    }
}
