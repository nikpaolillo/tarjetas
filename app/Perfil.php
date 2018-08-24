<?php

namespace TarjetasProactividad;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    protected $table = 'perfiles';

    public function PerfilUsuario() {
        return $this->hasMany('TarjetasProactividad\OperadoraPerfilUsuario');
    }
}
