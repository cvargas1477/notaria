<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;



class UsuarioMantenimiento extends Model
{

	use HasRoles;
	
	

    protected $table   = "users";

	protected $guarded = ['id'];

	protected $guard_name = 'web';
}
