<?php

namespace TarjetasProactividad\Http\Controllers;

use Illuminate\Http\Request;
use TarjetasProactividad\Equipo;
use TarjetasProactividad\Operadora;

class AdminController extends Controller
{
    public function index() {
        $operadora = Operadora::where('id', session('operadora'))->first();
        $operadora->load('Equipos');

        $equipos = $operadora->Equipos;

        return view('admin.index', ['equipos' => $equipos]);
    }
}
