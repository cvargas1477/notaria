<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->string('rut_venta');
            $table->string('numero_orden');
            $table->unsignedBigInteger('id_servicio');            
            $table->foreign('id_servicio')->references('id')->on('servicios');
            $table->decimal('valor',10,0);
            $table->decimal('cantidad',10,0);
            $table->decimal('total',10,0);
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
        Schema::dropIfExists('ventas');
    }
}
