<div class="table-responsive-md">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Proyecto</th>
                <th>Nivel</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($project_user as $p_user)
                <tr>
                    <td>{{$p_user->project->name}}</td>
                    <td>{{$p_user->level->name}}</td>
                    <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editRelation{{$p_user->id}}">
                            <i class="fas fa-edit"></i>
                        </button>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteRelation{{$p_user->id}}">
                            <i class="fas fa-times"></i>
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
