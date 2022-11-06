<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPresidenteToCooperativasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cooperativas', function (Blueprint $table) {
            //
            $table->string('presidente');
            $table->string('secretario');
            $table->string('montoApertura');
            $table->string('montoAhorro');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cooperativas', function (Blueprint $table) {
            //
        });
    }
}
