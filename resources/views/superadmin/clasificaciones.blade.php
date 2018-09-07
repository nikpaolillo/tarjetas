@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Clasificaciones</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="{{ route('clasificaciones.store') }}" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="clasificacion">Clasificacion</label>
                                    <input type="text" class="form-control" name="clasificacion" id="clasificacion">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="padre">Padre</label>
                                    <select id="padre" class="select-search form-control" name="padre">
                                        <option value="0">Seleccionar</option>
                                        @foreach($clasificaciones as $clasificacion)
                                            <option value="{{ $clasificacion->id }}">{{ $clasificacion->descripcion }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group-col-md-6">
                                    <button class="btn btn-success">Crear Clasificacion</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascripts')
    <script>
        $(document).ready(function () {
            $('.select-search').select2();
        });
    </script>
@endsection