<?php

namespace TarjetasProactividad;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    protected $table = 'equipos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'descripcion',
    ];

    public function Operadora()
    {
        return $this->belongsToMany(
            Operadora::class,
            'equipo_operadora_rol',
            'equipo_id',
            'operadora_id'
        );
    }

    public function EquipoUbicaciones() {
        return $this->hasMany(EquipoUbicacion::class);
    }
}
