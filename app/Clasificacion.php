<?php

namespace TarjetasProactividad;

use Illuminate\Database\Eloquent\Model;

class Clasificacion extends Model
{
    protected $table = 'clasificaciones';

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
        $clasificacion = self::where('id', $id)->first();

        while($padre) {
            if($clasificacion->padre_id == null) {
                $tree .= $clasificacion->descripcion;
                break;
            } else {
                $tree .= $clasificacion->descripcion . ' // ';
            }

            $clasificacion = self::where('id', $clasificacion->padre_id)->first();
        }

        return $tree;
    }
}
