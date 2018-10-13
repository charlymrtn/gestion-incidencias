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
        @include('common.notifications')
        <form action="{{route('usuarios.store')}}" method="POST">
            @csrf
            <div class="form-group col-md-5 ml-auto">
                <label for="email">Correo Electronico</label>
                <input type="email" class="form-control" name="email" id="email" value="{{old('email')}}">
            </div>
            <div class="form-group col-md-5 ml-auto">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}">
            </div>
            <div class="form-group col-md-5 ml-auto">
                <label for="password">Contraseña</label>
                <input type="text" class="form-control" name="password" id="password" value="{{old('password',str_random(6))}}">
            </div>
            <div class="form-group col-md-4 ml-auto">
                <button class="btn btn-primary"><i class="fas fa-user-plus"></i> Guardar Usuario</button>
            </div>
        </form>
        @include('admin.users.tables.users')
    </div>
</div>

@foreach ($usuarios as $user)
    @include('modals.delete-user')
@endforeach

@endsection
