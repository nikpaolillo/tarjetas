@extends('layouts.admin')

@section('content')}
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <button data-target="#nuevo-modelo" data-toggle="modal" class="btn btn-success">Nuevo modelo de tarjeta
            </button>
        </div>
    </div>

    <div class="row" style="margin-top:20px">
        <div class="col-md-12">
            <table class="table">
                <thead>
                <th scope="col">#</th>
                <th scope="col">Descripcion</th>
                <th>Puntaje</th>
                <th>Orden</th>
                <th></th>
                </thead>

                <tbody>
                @foreach($modelos as $modelo)
                    <tr>
                        <td>{{ $modelo->id }}</td>
                        <td>{{ $modelo->descripcion }}</td>
                        <td>{{ $modelo->puntaje }}</td>
                        <td>{{ $modelo->orden }}</td>
                        <td><a href="{{ route('modelos.show', [$modelo->id]) }}">Ver</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@include('admin.modelos.modal-nuevo-modelo')
