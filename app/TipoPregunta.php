<?php

namespace TarjetasProactividad;

use Illuminate\Database\Eloquent\Model;

class TipoPregunta extends Model
{
    protected $table = 'tipos_preguntas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'descripcion','abreviatura','respuesta_restringida','maximas_respuestas',
    ];

	public function ModeloTarjetaPregunta(){
    	return $this->hasMany("TarjetasProactividad\ModeloTarjetaPregunta");
    }
}
