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

                        <form action="{{ route('operadoras.store') }}" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="nombre">Descripcion</label>
                                    <input type="text" name="descripcion" class="form-control" id="descripcion" placeholder="Descripcion">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group-col-md-6">
                                    <button class="btn btn-success">Crear Operadora</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection