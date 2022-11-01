<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTipoCuentaIdToCuentaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cuenta', function (Blueprint $table) {
            $table->foreignId('tipo_cuenta_id')->constrained('tipo_cuenta');
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cuenta', function (Blueprint $table) {
            //
        });
    }
}
