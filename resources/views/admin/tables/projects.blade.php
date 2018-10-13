<div class="table-responsive-md">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Fecha de inicio</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <td>{{$project->name}}</td>
                    <td>{{$project->description}}</td>
                    <td>@if($project->start_date){{$project->start_date}}@endif</td>
                    <td>
                        <a class="btn btn-primary btn-sm" title="Editar" href="{{route('proyectos.edit',$project->id)}}">
                            <i class="fas fa-edit"></i>
                        </a>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteProject{{$project->id}}">
                            <i class="fas fa-times"></i>
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
