<div class="modal fade" id="nuevo-equipo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <form action="{{ route('equipos.store') }}" method="POST">
        @csrf
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nuevo equipo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="">Nombre del equipo</label>
                            <input type="text" name="descripcion" class="form-control">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="ubicacion_equipo">Ubicacion</label>
                            <select id="ubicacion_equipo" class="select-search form-control" name="ubicacion">
                                <option value="0">Seleccionar</option>
                                @foreach($ubicaciones as $ubicacion)
                                    <option value="{{ $ubicacion->id }}">{{ $ubicacion->getJerarquia($ubicacion->id) }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="categoria_equipo">Categoria</label>
                            <select id="categoria_equipo" class="select-search form-control" name="categoria">
                                <option value="0">Seleccionar</option>
                                @foreach($categorias as $categoria)
                                    <option value="{{ $categoria->id }}">{{ $categoria->getJerarquia($categoria->id) }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="clasificacion_equipo">Clasificacion</label>
                            <select id="clasificacion_equipo" class="select-search form-control" name="clasificacion">
                                <option value="0">Seleccionar</option>
                                @foreach($clasificaciones as $clasificacion)
                                    <option value="{{ $clasificacion->id }}">{{ $clasificacion->getJerarquia($clasificacion->id) }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </form>
</div>