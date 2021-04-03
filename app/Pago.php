<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
   protected $table   = "ventascabecera";
   

	protected $fillable = ['id', 'numero', 'ano','numero_orden', 'rut_venta', 'total', 'estado', 'fecha_venta', 'fecha_pago', 'numero_boleta' ];
}
