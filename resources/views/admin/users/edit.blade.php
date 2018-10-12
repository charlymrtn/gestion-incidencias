@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
@endsection

@section('scripts')
    <script defer src="https://use.fontawesome.com/releases/v5.4.1/js/all.js" integrity="sha384-L469/ELG4Bg9sDQbl0hvjMq8pOcqFgkSpwhwnslzvVVGpDjYJ6wJJyYjvG3u8XW7" crossorigin="anonymous"></script>
@endsection

@section('content')
<div class="card w-80">
    <div class="card-header">Usuarios</div>

    <div class="card-body">
        @include('common.errors')
        <form action="{{route('usuarios.update',$user->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group col-md-5">
                <label for="email">Correo Electronico</label>
                <input type="email" class="form-control" name="email" id="email" value="{{old('email',$user->email)}}">
            </div>
            <div class="form-group col-md-5">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" name="name" id="name" value="{{old('name',$user->name)}}">
            </div>
            <div class="form-group col-md-5">
                <label for="password">Contraseña</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>
            <div class="form-group col-md-4">
                <button class="btn btn-primary"><i class="fas fa-edit"></i> Guardar Cambios</button>
            </div>
        </form>
        @include('admin.users.tables.projects')

    </div>
</div>
@endsection
