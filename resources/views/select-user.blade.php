@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Seleccionar usuario</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="{{ route('select.user') }}" method="post">
                            @csrf

                            @foreach($user->PerfilUsuario as $perfil)
                                <input data-id="{{ $perfil->id }}" type="radio" name="id" value="{{ $perfil->id }}">
                                       {{ $perfil->operadora->descripcion }} ({{ $perfil->perfil->descripcion }}) <br>
                            @endforeach

                            <button type="submit" class="btn btn-primary">Ingresar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection




















































































































