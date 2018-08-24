<?php

namespace TarjetasProactividad;

use Illuminate\Database\Eloquent\Model;

class ModeloTarjetaPregunta extends Model
{
    protected $table = 'modelos_tarjetas_preguntas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'descripcion','tipo_pregunta_id','modelo_tarjeta_id','orden','puntaje','obligatorio','maximas_respuestas',
    ];

    public function ModeloTarjeta(){
    	$this->belongTo("TarjetasProactividad\ModeloTarjeta","modelo_tarjeta_id");
    }

    public function TipoPregunta(){
    	$this->belongTo("TarjetasProactividad\TipoPregunta","tipo_pregunta_id");
    }

    public function ModeloTarjetaRespuestas(){
    	return $this->hasMany("TarjetasProactividad\ModeloTarjetaRespuesta");
    }
}
