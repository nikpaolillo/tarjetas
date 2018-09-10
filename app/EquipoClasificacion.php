<?php

namespace TarjetasProactividad;

use Illuminate\Database\Eloquent\Model;

class EquipoClasificacion extends Model
{
    protected $table = 'clasificacion_equipo';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'equipo_id', 'clasificacion_id', 'fecha_desde', 'fecha_hasta'
    ];

    public function Clasificacion() {
        return $this->hasOne(Clasificacion::class, 'id', 'clasificacion_id');
    }

    public function Equipo() {
        return $this->hasOne(Equipo::class, 'id', 'equipo_id');
    }
}
