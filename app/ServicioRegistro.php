<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServicioRegistro extends Model
{
    
    protected $table   = "ventas";

	protected $guarded = ['id'];
}
