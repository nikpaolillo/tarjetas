@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Categorias</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="{{ route('categorias.store') }}" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="categoria">Categoria</label>
                                    <input type="text" class="form-control" name="categoria" id="categoria">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="padre">Padre</label>
                                    <select id="padre" class="select-search form-control" name="padre">
                                        <option value="0">Seleccionar</option>
                                        @foreach($categorias as $categoria)
                                            <option value="{{ $categoria->id }}">{{ $categoria->descripcion }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group-col-md-6">
                                    <button class="btn btn-success">Crear Categoria</button>
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