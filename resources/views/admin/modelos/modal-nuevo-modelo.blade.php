<div class="modal fade" id="nuevo-modelo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <form action="{{ route('modelos.store') }}" method="POST">
        @csrf
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nuevo modelo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="">Nombre del modelo</label>
                            <input type="text" name="descripcion" class="form-control">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="ubicacion_equipo">Puntaje</label>
                            <input class="form-control" type="text" name="puntaje">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="ubicacion_equipo">Orden</label>
                            <input class="form-control" type="text" name="orden">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </form>
</div>