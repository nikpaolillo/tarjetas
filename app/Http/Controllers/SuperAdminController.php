<?php

namespace TarjetasProactividad\Http\Controllers;

use Illuminate\Http\Request;
use TarjetasProactividad\OperadoraPerfilUsuario;

class SuperAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        return view('superadmin.index');
    }

    public function indexUsuarios()
    {
        return view('superadmin.usuarios');
    }
}
