<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ServicioPolicy
{
    use HandlesAuthorization;

    function Servicio(User $user) {
        if($user->can('create service') ){
          return true;
        }
        
    }
}
