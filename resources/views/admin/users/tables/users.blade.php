<div class="table-responsive-md">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Correo</th>
                <th>Nombre</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $user)
                <tr>
                    <td>{{$user->email}}</td>
                    <td>{{$user->name}}</td>
                    <td>
                        <form method="POST" action="{{route('usuarios.destroy',$user->id)}}">
                            @csrf
                            @method('DELETE')
                            <a class="btn btn-primary btn-sm" title="Editar" href="{{route('usuarios.edit',$user->id)}}">
                                <i class="fas fa-edit"></i>
                            </a>
                            <button type="submit" class="btn btn-danger btn-sm" title="Dar de baja">
                                <i class="fas fa-user-times"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
