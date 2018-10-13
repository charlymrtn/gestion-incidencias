<div class="table-responsive-md">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Correo</th>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $user)
                <tr>
                    <td>{{$user->email}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->tipo}}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" title="Editar" href="{{route('usuarios.edit',$user->id)}}">
                            <i class="fas fa-edit"></i>
                        </a>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteUser{{$user->id}}">
                            <i class="fas fa-times"></i>
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
