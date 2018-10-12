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
            <tr>
                <td>Proyecto A</td>
                <td>Nivel A1</td>
                <td>
                    <form method="POST" action="">
                        @csrf
                        @method('DELETE')
                        <a class="btn btn-primary btn-sm" title="Editar" href="">
                            <i class="fas fa-edit"></i>
                        </a>
                        <button type="submit" class="btn btn-danger btn-sm" title="Quitar">
                            <i class="fas fa-times"></i>
                        </button>
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
</div>
