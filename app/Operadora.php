<?php

namespace TarjetasProactividad;

use Illuminate\Database\Eloquent\Model;

class Operadora extends Model
{
	protected $table = 'operadoras';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'descripcion', 'logo', 'css','css_mobile',
    ];

    public function ModelosTarjetas()
    {
    	return $this->hasMany("TarjetasProactividad\ModeloTarjeta");
    }

    public function PerfilUsuario()
    {
        return $this->hasMany('TarjetasProactividad\OperadoraPerfilUsuario');
    }

    public function Equipos()
    {
        return $this->belongsToMany(
            Equipo::class,
            'equipo_operadora_rol',
            'operadora_id',
            'equipo_id'
        );
    }
}

