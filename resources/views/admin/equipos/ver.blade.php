@extends('layouts.app')

@section('content')
    <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="ubicaciones-tab" data-toggle="tab" href="#ubicaciones" role="tab"
                   aria-controls="ubicaciones" aria-selected="false">Ubicaciones</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="messages-tab" data-toggle="tab" href="#messages" role="tab"
                   aria-controls="messages" aria-selected="false">Clasificaciones</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="categorias-tab" data-toggle="tab" href="#categorias" role="tab"
                   aria-controls="categorias" aria-selected="false">Categorias</a>
            </li>
        </ul>

        <div class="tab-content">
            {{-- Equipos ubicaciones --}}
            <div class="tab-pane fade show active" id="ubicaciones" role="tabpanel"
                 aria-labelledby="ubicaciones-tab">
                <div style="margin-top:30px" class="container">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Descripcion</th>
                            <th>Fecha Desde</th>
                            <th>Fecha Hasta</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($equipos_ubicaciones as $equipo)
                            <tr>
                                <td>{{ $equipo->Ubicacion->descripcion }}</td>
                                <td>{{ $equipo->fecha_desde }}</td>
                                <td>{{ $equipo->fecha_hasta }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Equipos categorias --}}
            <div class="tab-pane fade" id="categorias" role="tabpanel"
                 aria-labelledby="categorias-tab">
                categorias
            </div>
        </div>
    </div>
@endsection