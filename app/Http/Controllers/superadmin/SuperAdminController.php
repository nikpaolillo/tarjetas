<?php

namespace TarjetasProactividad\Http\Controllers\superadmin;

use TarjetasProactividad\Http\Controllers\Controller;

class SuperAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        return view('superadmin.index');
    }
}
