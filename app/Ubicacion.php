<?php

namespace TarjetasProactividad;

use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model
{
    protected $table = 'ubicaciones';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'descripcion', 'padre_id'
    ];

    public function getJerarquia($id) {
        $tree = "";
        $padre = true;
        $ubicacion = self::where('id', $id)->first();

        while($padre) {
            if($ubicacion->padre_id == null) {
                $tree .= $ubicacion->descripcion;
                break;
            } else {
                $tree .= $ubicacion->descripcion . '/';
            }

            $ubicacion = self::where('id', $ubicacion->padre_id)->first();
        }

        return $tree;
    }
}
