<div class="row">
    <div class="col-md-6">
        <div class="table-responsive-md">
            <p>Categorías</p>
            <form class="form-inline" action="{{route('categorias.store')}}" method="POST">
                @csrf
                <input type="hidden" name="project_id" value="{{$proyecto->id}}">
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
                    @if($categorias)
                        @foreach($categorias as $category)
                        <tr>
                            <td>{{$category->name}}</td>
                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editCategory{{$category->id}}">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteCategory{{$category->id}}">
                                    <i class="fas fa-times"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-6">
        <div class="table-responsive-md">
            <p>Niveles</p>
            <form class="form-inline" action="{{route('niveles.store')}}" method="POST">
                @csrf
                <input type="hidden" name="project_id" value="{{$proyecto->id}}">
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
                    @if($niveles)
                        @foreach($niveles as $key => $level)
                        <tr>
                            <td>N{{$key+1}}</td>
                            <td>{{$level->name}}</td>
                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editLevel{{$level->id}}">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteLevel{{$level->id}}">
                                    <i class="fas fa-times"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    @endif

                </tbody>
            </table>
        </div>
    </div>
</div>
