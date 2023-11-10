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
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('dni_empleado');
            $table->string('direccion');
            $table->string('estado_civil');
            $table->string('nivel_educacion');
            $table->string('telefono');
            $table->string('email');
            $table->float('sueldo_basico');
            $table->date('fecha_ingreso');
            $table->bigInteger('id_distrito')->unsigned();
            $table->bigInteger('cod_cargo')->unsigned();

            $table->foreign('id_distrito')->references('id')->on('distritos');
            $table->foreign('cod_cargo')->references('id')->on('cargos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleados');
    }
};
