<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaDetalleDocu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DETALLE_DOCUMENTO', function (Blueprint $table) {
            $table->bigIncrements('id_detalle_documento');
            $table->integer('id_ficha_cliente');
            $table->integer('id_documento');
            $table->string('ruta');
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
        Schema::dropIfExists('DETALLE_DOCUMENTO');
    }
}
