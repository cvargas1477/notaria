<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FinalizarPago extends Model
{
    protected $table   = "finalizarpago";

	//protected $guarded = ['id'];
	protected $fillable = ['id', 'numero_orden', 'id_usuario' ];
}


