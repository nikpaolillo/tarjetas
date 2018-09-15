<?php

namespace TarjetasProactividad\Http\Controllers;

use Illuminate\Http\Request;
use TarjetasProactividad\Categoria;
use TarjetasProactividad\Clasificacion;
use TarjetasProactividad\Equipo;
use TarjetasProactividad\EquipoCategoria;
use TarjetasProactividad\EquipoClasificacion;
use TarjetasProactividad\EquipoUbicacion;
use TarjetasProactividad\Operadora;
use TarjetasProactividad\Ubicacion;

class EquiposController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $operadora = Operadora::where('id', session('operadora'))->first();
        $operadora->load('Equipos');

        $equipos = $operadora->Equipos;

        $ubicaciones = Ubicacion::all();
        $categorias = Categoria::all();
        $clasificaciones = Clasificacion::all();

        return view('admin.equipos.index', [
            'equipos' => $equipos,
            'ubicaciones' => $ubicaciones,
            'categorias' => $categorias,
            'clasificaciones' => $clasificaciones
        ]);
    }

    public function show(Equipo $equipo)
    {
        $equipos_ubicaciones = EquipoUbicacion::where('equipo_id', $equipo->id)->get();
        $equipos_ubicaciones->load('Ubicacion');
        $ubicaciones = Ubicacion::all();

        $equipos_categorias = EquipoCategoria::where('equipo_id', $equipo->id)->get();
        $equipos_categorias->load('Categoria');

        $equipos_clasificaciones = EquipoClasificacion::where('equipo_id', $equipo->id)->get();
        $equipos_clasificaciones->load('Clasificacion');

        return view('admin.equipos.ver', [
                'equipos_ubicaciones' => $equipos_ubicaciones,
                'ubicaciones' => $ubicaciones,
                'equipos_categorias' => $equipos_categorias,
                'equipos_clasificaciones' => $equipos_clasificaciones
            ]
        );
    }

    public function store(Request $request)
    {

        $equipo = Equipo::create([
            'descripcion' => $request->descripcion
        ]);

        EquipoUbicacion::create([
            'equipo_id' => $equipo->id,
            'ubicacion_id' => $request->ubicacion,
            'fecha_desde' => date('Ymd')
        ]);

        EquipoCategoria::create([
            'equipo_id' => $equipo->id,
            'categoria_id' => $request->categoria,
            'fecha_desde' => date('Ymd')
        ]);

        EquipoClasificacion::create([
            'equipo_id' => $equipo->id,
            'clasificacion_id' => $request->clasificacion,
            'fecha_desde' => date('Ymd')
        ]);

        return redirect()->back();
    }

    public function nuevaUbicacion(Request $request) {
        $equipo_ubicacion_viejo = EquipoUbicacion::where('equipo_id', $request->equipo_id)->where('fecha_hasta', null)->first();
        $equipo_ubicacion_viejo->update(['fecha_hasta' => date('Ymd', strtotime('-1 day'))]);

        EquipoUbicacion::create([
            'equipo_id' => $request->equipo_id,
            'ubicacion_id' => $request->ubicacion,
            'fecha_desde' => date('Ymd')
        ]);

        return redirect()->back();
    }

}
