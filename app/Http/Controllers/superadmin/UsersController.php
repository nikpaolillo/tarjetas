<?php

namespace TarjetasProactividad\Http\Controllers;

use Illuminate\Http\Request;
use TarjetasProactividad\User;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        return view('superadmin.usuarios');
    }

    public function store(Request $request) {
        User::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'usuario' => $request->usuario,
            'password' => bcrypt($request->password)
        ]);

        return redirect()->back();
    }

    
}
