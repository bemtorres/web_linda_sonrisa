<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaFichaCliente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('FICHA_CLIENTE', function (Blueprint $table) {
            $table->bigIncrements('id_ficha_cliente');
            $table->string('username', 60);
            $table->string('password', 64);
            $table->string('run', 15);
            $table->string('nombres', 100);
            $table->string('apellidos', 100);
            $table->string('telefono', 60)->nullable();
            $table->string('correo', 100);
            $table->integer('id_comuna');
            $table->integer('bloqueo');
            $table->integer('activo');
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
        Schema::dropIfExists('FICHA_CLIENTE');
    }
}
