<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaReservarHora extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservar_hora', function (Blueprint $table) {
            $table->bigIncrements('id_reservar_hora');
            $table->integer('id_centro');
            $table->date('fecha_reserva');
            $table->integer('id_horario');
            $table->integer('id_odontologo')->nullable();
            $table->text('comentario')->nullable();
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
        Schema::dropIfExists('reservar_hora');
    }
}
