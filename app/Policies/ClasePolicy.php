<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Clase;

class ClasePolicy
{
    public function creadorClase(User $usuario, Clase $clase)
    {
        if ($usuario->id == $clase->user_id) {
            return true;
        } else {
            return false;
        }
    }
}
