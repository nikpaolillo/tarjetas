<?php


namespace TarjetasProactividad\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use TarjetasProactividad\OperadoraPerfilUsuario;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function indexSelectUser()
    {
        return view('select-user', ['user' => Auth::user()]);
    }

    public function selectUser(Request $request) {
        $user = Auth::user();
        $user = $user->load('PerfilUsuario.perfil', 'PerfilUsuario.operadora');
        $user = $user->PerfilUsuario->where('id', $request->id)->first();

        session([
            'operadora' => $user->operadora_id,
            'perfil' => $user->perfil
        ]);

        if($user->perfil->descripcion == "Usuario") {
            return redirect()->route('usuario');
        } else {
            return redirect()->route('admin');
        }
    }
}
