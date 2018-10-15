<div class="row">
    <div class="col-md-6">
        <div class="table-responsive-md">
            <p>Categorías</p>
            <form class="form-inline" action="{{route('categorias.store',$proyecto->id)}}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="text" name="name" id="name" placeholder="Ingrese nombre..." class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success"><i class="fas fa-plus"></i></button>
                </div>
            </form>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Categoría A</td>
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
    </div>
    <div class="col-md-6">
        <div class="table-responsive-md">
            <p>Niveles</p>
            <form class="form-inline" action="{{route('niveles.store',$proyecto->id)}}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="text" name="name" id="name" placeholder="Ingrese nombre..." class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success"><i class="fas fa-plus"></i></button>
                </div>
            </form>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nivel</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>N1</td>
                        <td>Atención Básica</td>
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
    </div>
</div>
