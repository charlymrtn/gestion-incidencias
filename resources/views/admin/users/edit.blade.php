@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
@endsection

@section('scripts')
    <script defer src="https://use.fontawesome.com/releases/v5.4.1/js/all.js" integrity="sha384-L469/ELG4Bg9sDQbl0hvjMq8pOcqFgkSpwhwnslzvVVGpDjYJ6wJJyYjvG3u8XW7" crossorigin="anonymous"></script>
    
    <script src="{{ asset('js/custom.js')}}" type="text/javascript"></script>
@endsection

@section('content')
<div class="card w-80">
    <div class="card-header">Editar Usuario</div>

    <div class="card-body">
        @include('common.errors')
        @include('common.notifications')
        <form action="{{route('usuarios.update',$user->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group col-md-5">
                <label for="email">Correo Electronico</label>
                <input type="email" class="form-control" readonly name="email" id="email" value="{{old('email',$user->email)}}">
            </div>
            <div class="form-group col-md-5">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" name="name" id="name" value="{{old('name',$user->name)}}">
            </div>
            <div class="form-group col-md-5">
                <label for="password">Contraseña <em>Ingresar solo si se desea modificar</em></label>
                <input type="password" class="form-control" name="password" id="password">
            </div>
            <div class="row">
                <div class="form-group col-md-3">
                    <button class="btn btn-sm btn-primary"><i class="fas fa-edit"></i> Guardar Cambios</button>

                </div>
                <div class="form-group col-md-3">
                    <a class="btn btn-sm btn-info" href="{{route('usuarios.index')}}"><i class="fas fa-backward"></i> Regresar</a>

                </div>
            </div>
        </form>
        <form action="{{route('usuarios.proyectos.store')}}" method="POST">
            <div class="row">
                @csrf
                <input type="hidden" name="user_id" value="{{$user->id}}">
                <div class="col-md-4">
                    <select name="project_id" id="projects" class="form-control">
                        <option value="">Selecciona un proyecto</option>
                        @foreach ($projects as $project)
                            <option value="{{$project->id}}">{{$project->name}}</option>  
                        @endforeach
                    </select>
                </div>
                <br>
                <div class="col-md-4">
                    <select name="level_id" id="levels" class="form-control">
                        <option value="">Selecciona un nivel</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <button class="btn btn-primary btn-block btn-sm"><i class="fas fa-plus"></i>Asignar</button>
                </div>
            </div>
        </form>
        @include('admin.users.tables.projects-users')

    </div>
</div>
@if($project_user)
    @foreach($project_user as $p_user)
        @include('modals.edit-relation')
        @include('modals.delete-relation')
    @endforeach
@endif

@endsection
