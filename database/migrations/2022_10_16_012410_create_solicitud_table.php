<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitud', function (Blueprint $table) {
            $table->id();
            $table->string('nombres');
            $table->string('primerApellido');
            $table->string('segundoApellido');
            $table->string('apellidoCasada');
            $table->string('genero');
            $table->date('fechaNacimiento');
            $table->string('nacionalidad');
            $table->string('email1');
            $table->string('email2');
            $table->string('telefonoCasa');
            $table->string('telefonoTrabajo');
            $table->string('celular1');
            $table->string('celular2');
            $table->foreignId('subregiones_id')->constrained();
            $table->foreignId('conyuge_id')->constrained('conyuge');
            $table->foreignId('estado_civil_id')->constrained('estado_civil');
            $table->foreignId('estado_solicitud_id')->constrained('estado_solicitud');
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
        Schema::dropIfExists('solicitud');
    }
}
