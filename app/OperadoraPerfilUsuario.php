<?php

namespace TarjetasProactividad;

use Illuminate\Database\Eloquent\Model;

class OperadoraPerfilUsuario extends Model
{
    protected $table = 'operadora_perfil_usuario';

    protected $fillable = ['usuario_id', 'operadora_id', 'perfil_id'];

    public function User() {
        return $this->belongsTo('TarjetasProactividad\User', 'usuario_id');
    }

    public function Operadora() {
        return $this->belongsTo('TarjetasProactividad\Operadora');
    }

    public function Perfil() {
        return $this->belongsTo('TarjetasProactividad\Perfil');
    }
}
