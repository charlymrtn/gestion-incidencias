<div class="card bg-success mb-3">
    <div class="card-header">Incidencias asignadas a mi.</div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Categoría</th>
                    <th>Severidad</th>
                    <th>Estado</th>
                    <th>Fecha Creación</th>
                    <th>Resumen</th>
                </tr>
            </thead>
            <tbody id="panel_my_bugs">
                @foreach ($my_bugs as $bug)
                    <tr>
                        <td>{{$bug->id}}</td>
                        <td>{{$bug->category->name}}</td>
                        <td>{{$bug->severity_name}}</td>
                        <td></td>
                        <td>{{$bug->created}}</td>
                        <td>{{$bug->resume}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="card bg-warning mb-3">
    <div class="card-header">Incidencias sin asignar.</div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Categoría</th>
                    <th>Severidad</th>
                    <th>Estado</th>
                    <th>Fecha Creación</th>
                    <th>Resumen</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody id="panel_not_bugs">
                @foreach ($not_bugs as $bug)
                    <tr>
                        <td>{{$bug->id}}</td>
                        <td>{{$bug->category->name}}</td>
                        <td>{{$bug->severity_name}}</td>
                        <td></td>
                        <td>{{$bug->created}}</td>
                        <td>{{$bug->resume}}</td>
                        <td>
                            <a href="" class="btn btn-secondary btn-sm">Atender</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="card bg-info mb-3">
    <div class="card-header">Incidencias reportadas por mi.</div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Categoría</th>
                    <th>Severidad</th>
                    <th>Estado</th>
                    <th>Fecha Creación</th>
                    <th>Resumen</th>
                    <th>Responsable</th>
                </tr>
            </thead>
            <tbody id="panel_reported_bugs">
                @foreach ($reported_bugs as $bug)
                    <tr>
                        <td>{{$bug->id}}</td>
                        <td>{{$bug->category->name}}</td>
                        <td>{{$bug->severity_name}}</td>
                        <td></td>
                        <td>{{$bug->created}}</td>
                        <td>{{$bug->resume}}</td>
                        <td>@if($bug->support) {{$bug->support->name}} @else No asignado @endif</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
