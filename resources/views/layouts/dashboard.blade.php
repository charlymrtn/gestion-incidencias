@if(Auth::user()->is_support)

<div class="card bg-light mb-3">
    <div class="card-header bg-primary"><strong>Incidencias asignadas a mi.</strong></div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Categoría</th>
                    <th>Severidad</th>
                    <th>Estado</th>
                    <th>Nivel de Atención</th>
                    <th>Fecha Creación</th>
                </tr>
            </thead>
            <tbody id="panel_my_bugs">
                @foreach ($my_bugs as $bug)
                    <tr @if($bug->state_id == 2) class="bg-success" @elseif(($bug->state_id == 1)) class="bg-info" @else class="bg-warning" @endif>
                        <td><a href="{{route('incidencias.show',$bug->id)}}">{{$bug->title}}</a></td>
                        <td>{{$bug->category_name}}</td>
                        <td>{{$bug->severity_name}}</td>
                        <td>{{$bug->state}}</td>
                        <td>{{$bug->level_name}}</td>
                        <td>{{$bug->created}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="card bg-light mb-3">
    <div class="card-header bg-primary">Incidencias sin asignar.</div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Categoría</th>
                    <th>Severidad</th>
                    <th>Estado</th>
                    <th>Nivel de Atención</th>
                    <th>Fecha Creación</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody id="panel_not_bugs">
                @foreach ($not_bugs as $bug)
                    <tr @if($bug->state_id == 2) class="bg-success" @elseif(($bug->state_id == 1)) class="bg-info" @else class="bg-warning" @endif>
                        <td><a href="{{route('incidencias.show',$bug->id)}}">{{$bug->id}}</a></td>
                        <td>{{$bug->category_name}}</td>
                        <td>{{$bug->severity_name}}</td>
                        <td>{{$bug->state}}</td>
                        <td>{{$bug->level_name}}</td>
                        <td>{{$bug->created}}</td>
                        <td>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#takeIncident{{$bug->id}}">
                                Atender
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif
<div class="card bg-light mb-3">
    <div class="card-header bg-primary">Incidencias reportadas por mi.</div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Categoría</th>
                    <th>Severidad</th>
                    <th>Estado</th>
                    <th>Nivel de Atención</th>
                    <th>Fecha Creación</th>
                    <th>Responsable</th>
                </tr>
            </thead>
            <tbody id="panel_reported_bugs">
                @foreach ($reported_bugs as $bug)
                    <tr @if($bug->state_id == 2) class="bg-success" @elseif(($bug->state_id == 1)) class="bg-info" @else class="bg-warning" @endif>
                        <td><a href="{{route('incidencias.show',$bug->id)}}">{{$bug->id}}</a></td>
                        <td>{{$bug->category_name}}</td>
                        <td>{{$bug->severity_name}}</td>
                        <td>{{$bug->state}}</td>
                        <td>{{$bug->level_name}}</td>
                        <td>{{$bug->created}}</td>
                        <td>{{$bug->support_name}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@if(Auth::user()->is_support)
    @foreach($not_bugs as $bug)
        @include('modals.take-incident')
    @endforeach
@endif
