<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActividadEconomicaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividad_economica', function (Blueprint $table) {
            $table->id();
            $table->string('nombreEmpresa');
            $table->string('cargoPuesto');
            $table->integer('años');
            $table->integer('meses');
            $table->boolean('empleadoEmpresario');
            $table->foreignId('sector_id')->constrained('sector');
            $table->foreignId('profesion_id')->constrained('profesion');
            $table->foreignId('solicitud_id')->constrained('solicitud');
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
        Schema::dropIfExists('actividad_economica');
    }
}
