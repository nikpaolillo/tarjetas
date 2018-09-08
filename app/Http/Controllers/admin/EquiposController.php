<?php

namespace TarjetasProactividad\Http\Controllers;

use Illuminate\Http\Request;
use TarjetasProactividad\Equipo;
use TarjetasProactividad\EquipoUbicacion;

class EquiposController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $ubicaciones = Ubicacion::all();

        return view('superadmin.ubicaciones', ['ubicaciones' => $ubicaciones]);
    }

    public function show(Equipo $equipo) {
        $equipos_ubicaciones = EquipoUbicacion::where('equipo_id', $equipo->id)->get();
        $equipos_ubicaciones->load('Ubicacion');

        return view('admin.equipos.ver', ['equipos_ubicaciones' => $equipos_ubicaciones]);
    }
}
