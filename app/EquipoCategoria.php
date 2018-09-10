<?php

namespace TarjetasProactividad;

use Illuminate\Database\Eloquent\Model;

class EquipoCategoria extends Model
{
    protected $table = 'categoria_equipo';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'equipo_id', 'categoria_id', 'fecha_desde', 'fecha_hasta'
    ];

    public function Categoria() {
        return $this->hasOne(Categoria::class, 'id', 'categoria_id');
    }

    public function Equipo() {
        return $this->hasOne(Equipo::class, 'id', 'equipo_id');
    }
}
