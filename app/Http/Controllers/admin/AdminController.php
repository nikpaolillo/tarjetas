<?php

namespace TarjetasProactividad\Http\Controllers\admin;

use TarjetasProactividad\Categoria;
use TarjetasProactividad\Clasificacion;
use TarjetasProactividad\Http\Controllers\Controller;
use Illuminate\Http\Request;
use TarjetasProactividad\Equipo;
use TarjetasProactividad\Operadora;
use TarjetasProactividad\Ubicacion;

class AdminController extends Controller
{
    public function index() {
        $operadora = Operadora::where('id', session('operadora'))->first();
        $operadora->load('Equipos');

        $equipos = $operadora->Equipos;

        $ubicaciones = Ubicacion::all();
        $categorias = Categoria::all();
        $clasificaciones = Clasificacion::all();

        return view('admin.index', [
            'equipos' => $equipos,
            'ubicaciones' => $ubicaciones,
            'categorias' => $categorias,
            'clasificaciones' => $clasificaciones
            ]);
    }
}
