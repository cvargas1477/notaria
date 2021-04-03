<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentascabeceraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventascabecera', function (Blueprint $table) {
            $table->id();
            $table->decimal('numero',10,0)->nullable();
            $table->decimal('ano',10,0)->nullable();
            $table->string('numero_orden');
            $table->unsignedBigInteger('id_usuario');
            $table->foreign('id_usuario')->references('id')->on('users');           
            $table->string('rut_venta');
            $table->decimal('total',10,0);
            $table->string('estado');
            $table->date('fecha_venta')->nullable();
            $table->date('fecha_pago')->nullable();
            $table->string('numero_boleta')->nullable();            
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
        Schema::dropIfExists('ventascabecera');
    }
}
