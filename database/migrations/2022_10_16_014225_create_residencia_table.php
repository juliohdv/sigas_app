<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResidenciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('residencia', function (Blueprint $table) {
            $table->id();
            $table->string('barrioColoniaResidencial');
            $table->string('callePasaje');
            $table->string('casaDepartamento');
            $table->string('latitudMapa');
            $table->string('longitudMapa');
            $table->foreignId('subregion_id')->constrained('subregiones');
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
        Schema::dropIfExists('residencia');
    }
}
