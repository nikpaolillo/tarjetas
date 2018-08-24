<div class="row">
    <div class="col-md-12">
        <button class="btn btn-success">Nuevo equipo</button>
    </div>
</div>

<div class="row" style="margin-top:20px">
    <div class="col-md-12">
        <table class="table">
            <thead>
            <th scope="col">Descripcion</th>
            <th scope="col">Created At</th>
            <th>Acciones</th>
            </thead>

            <tbody>
            @foreach($equipos as $equipo)
                <tr>
                    <td>{{ $equipo->descripcion }}</td>
                    <td>{{ $equipo->created_at }}</td>
                    <td>Ver</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>