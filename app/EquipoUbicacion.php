<?php

namespace TarjetasProactividad;

use Illuminate\Database\Eloquent\Model;

class EquipoUbicacion extends Model
{
    protected $table = 'equipo_ubicacion';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'equipo_id', 'ubicacacion_id', 'fecha_desde', 'fecha_hasta'
    ];

    public function Ubicacion() {
        return $this->hasOne(Ubicacion::class, 'id', 'ubicacion_id');
    }

    public function Equipo() {
        return $this->hasOne(Equipo::class, 'id', 'equipo_id');
    }
}
