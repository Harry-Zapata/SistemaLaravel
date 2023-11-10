<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boletas', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_emision');
            $table->string('estado_boleta');
            $table->bigInteger('cliente_id')->unsigned();
            $table->bigInteger('cod_empleado')->unsigned();

            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->foreign('cod_empleado')->references('id')->on('empleados');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('boletas');
    }
};
