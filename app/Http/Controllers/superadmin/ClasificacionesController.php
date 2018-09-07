<?php

namespace TarjetasProactividad\Http\Controllers;

use Illuminate\Http\Request;
use TarjetasProactividad\Clasificacion;

class ClasificacionesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $clasificaciones = Clasificacion::all();

        return view('superadmin.clasificaciones', ['clasificaciones' => $clasificaciones]);
    }

    public function store(Request $request) {
        if($request->padre == 0) {
            Clasificacion::create([
                'descripcion' => $request->clasificacion,
                'padre_id' => null
            ]);
        } else {
            Clasificacion::create([
                'descripcion' => $request->clasificacion,
                'padre_id' => $request->padre
            ]);
        }

        return redirect()->back();
    }
}
