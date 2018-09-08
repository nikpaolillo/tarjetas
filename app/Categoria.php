<?php

namespace TarjetasProactividad;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';

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
        $categoria = self::where('id', $id)->first();

        while($padre) {
            if($categoria->padre_id == null) {
                $tree .= $categoria->descripcion;
                break;
            } else {
                $tree .= $categoria->descripcion . ' // ';
            }

            $categoria = self::where('id', $categoria->padre_id)->first();
        }

        return $tree;
    }
}
