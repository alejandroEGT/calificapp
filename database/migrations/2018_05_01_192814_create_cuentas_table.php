<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuentas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('establecimiento');
            $table->text('direccion');
            $table->string('email')->unique();
            $table->integer('celular')->nullable();
            $table->text('comentario')->nullable();
            $table->integer('estado_cuenta')->unsigned();
            $table->timestamps();

            $table->foreign('estado_cuenta')->references('id')->on('estado-cuenta');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cuentas');
    }
}
