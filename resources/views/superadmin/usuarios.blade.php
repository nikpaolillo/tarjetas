@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Usuarios</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="{{ route('users.store') }}" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" name="nombre" class="form-control" id="nombre"
                                           placeholder="Nombre">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="apellido">Apellido</label>
                                    <input type="text" name="apellido" class="form-control" id="apellido"
                                           placeholder="Apellido">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="usuario">Usuario</label>
                                    <input type="text" name="usuario" class="form-control" id="usuario"
                                           placeholder="Usuario">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control" id="password"
                                           placeholder="Password">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group-col-md-6">
                                    <button class="btn btn-success">Crear Usuario</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection