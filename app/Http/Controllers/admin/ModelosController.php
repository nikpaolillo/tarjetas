<?php

namespace TarjetasProactividad\Http\Controllers;

use Illuminate\Http\Request;
use TarjetasProactividad\Equipo;
use TarjetasProactividad\EquipoCategoria;
use TarjetasProactividad\EquipoClasificacion;
use TarjetasProactividad\EquipoUbicacion;
use TarjetasProactividad\ModeloTarjeta;
use TarjetasProactividad\Operadora;
use TarjetasProactividad\Ubicacion;

class ModelosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $operadora = Operadora::where('id', session('operadora'))->first();
        $operadora->load('ModelosTarjetas');

        $modelos = $operadora->ModelosTarjetas;

        return view('admin.modelos.index', ['modelos' => $modelos]);
    }

    public function store(Request $request)
    {
        ModeloTarjeta::create([
            'descripcion' => $request->descripcion,
            'orden' => $request->orden,
            'puntaje' => $request->puntaje,
            'operadora_id' => session('operadora')
        ]);

        return redirect()->back();
    }

    public function show(ModeloTarjeta $modelo)
    {

    }
}
