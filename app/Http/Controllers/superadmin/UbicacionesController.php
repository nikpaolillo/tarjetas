<?php

namespace TarjetasProactividad\Http\Controllers;

use Illuminate\Http\Request;
use TarjetasProactividad\Ubicacion;

class UbicacionesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $ubicaciones = Ubicacion::all();

        return view('superadmin.ubicaciones', ['ubicaciones' => $ubicaciones]);
    }

    public function store(Request $request) {
        if($request->padre == 0) {
            Ubicacion::create([
                'descripcion' => $request->ubicacion,
                'padre_id' => null
            ]);
        } else {
            Ubicacion::create([
                'descripcion' => $request->ubicacion,
                'padre_id' => $request->padre
            ]);
        }

        return redirect()->back();
    }
}
