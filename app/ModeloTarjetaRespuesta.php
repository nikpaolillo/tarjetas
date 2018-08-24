<?php

namespace TarjetasProactividad;

use Illuminate\Database\Eloquent\Model;

class ModeloTarjetaRespuesta extends Model
{
    protected $table = 'modelos_tarjetas_respuestas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'descripcion','modelo_tarjeta_pregunta_id','orden','puntaje',
    ];

    public function ModeloTarjetaPregunta(){
    	$this->belongTo("TarjetasProactividad\ModeloTarjetaPregunta", "modelo_tarjeta_pregunta_id");
    }

}
