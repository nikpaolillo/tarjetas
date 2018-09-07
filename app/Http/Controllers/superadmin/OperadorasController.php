<?php

namespace TarjetasProactividad\Http\Controllers;

use Illuminate\Http\Request;
use TarjetasProactividad\Operadora;

class OperadorasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        return view('superadmin.operadoras');
    }

    public function store(Request $request) {
        Operadora::create([
            'descripcion' => $request->descripcion
        ]);

        return redirect()->back();
    }
}
