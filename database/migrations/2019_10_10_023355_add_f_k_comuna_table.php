<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFKComunaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('COMUNA', function (Blueprint $table) {
            $table->integer('ID_REGION')->unsigned();
            $table->foreign('ID_REGION')->references('ID_REGION')->on('REGION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('COMUNA', function (Blueprint $table) {
            $table->dropForeign('COMUNA_ID_REGION_FK');
        });
    }
}
