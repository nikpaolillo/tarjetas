<?php

namespace TarjetasProactividad;

use Illuminate\Database\Eloquent\Model;

class ModeloTarjeta extends Model
{
    protected $table = 'modelos_tarjetas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'descripcion','puntaje','orden','css','css_mobile','operadora_id',
    ];

    public function Operadoras(){
    	$this->belongTo("TarjetasProactividad\Operadora");
    }

    public function ModeloTarjetaPreguntas(){
    	return $this->hasMany("TarjetasProactividad\ModeloTarjetaPregunta");
    }
}
