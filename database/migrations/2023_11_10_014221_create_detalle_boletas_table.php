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
        Schema::create('detalle_boletas', function (Blueprint $table) {
            $table->bigInteger('num_boleta')->unsigned();
            $table->bigInteger('id_prod')->unsigned();
            $table->integer('cantidad');
            $table->float('precio');

            $table->foreign('num_boleta')->references('id')->on('boletas');
            $table->foreign('id_prod')->references('id')->on('productos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_boletas');
    }
};
