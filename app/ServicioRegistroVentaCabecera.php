<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServicioRegistroVentaCabecera extends Model
{
   protected $table   = "ventascabecera";
   //protected  $guardes = ['id'];

	protected $fillable = [	'id',
							'numero',
							'ano', 
							'numero_orden',
							'id_usuario',
							'rut_venta',
							'total',
							'estado',
							'fecha_venta',
							'fecha_pago',
							'numero_boleta'  ];
}
