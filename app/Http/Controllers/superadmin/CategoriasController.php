<?php

namespace TarjetasProactividad\Http\Controllers;

use Illuminate\Http\Request;
use TarjetasProactividad\Categoria;

class CategoriasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $categorias = Categoria::all();

        return view('superadmin.categorias', ['categorias' => $categorias]);
    }

    public function store(Request $request) {
        if($request->padre == 0) {
            Categoria::create([
                'descripcion' => $request->categoria,
                'padre_id' => null
            ]);
        } else {
            Categoria::create([
                'descripcion' => $request->categoria,
                'padre_id' => $request->padre
            ]);
        }

        return redirect()->back();
    }
}
