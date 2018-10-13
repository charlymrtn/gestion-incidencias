@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
@endsection

@section('scripts')
    <script defer src="https://use.fontawesome.com/releases/v5.4.1/js/all.js" integrity="sha384-L469/ELG4Bg9sDQbl0hvjMq8pOcqFgkSpwhwnslzvVVGpDjYJ6wJJyYjvG3u8XW7" crossorigin="anonymous"></script>
@endsection

@section('content')
<div class="card w-80">
    <div class="card-header">Editar Proyecto</div>

    <div class="card-body">
        @include('common.errors')
        <form action="{{route('proyectos.update',$proyecto->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group col-md-5">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" name="name" id="name" value="{{old('name',$proyecto->name)}}">
            </div>
            <div class="form-group col-md-5">
                <label for="description">Descripción</label>
                <textarea name="description" id="description">{{old('description',$proyecto->description)}}</textarea>
            </div>
            <div class="row">
                <div class="form-group col-md-3">
                    <button class="btn btn-sm btn-primary"><i class="fas fa-edit"></i> Guardar Cambios</button>

                </div>
                <div class="form-group col-md-3">
                    <a class="btn btn-sm btn-info" href="{{route('proyectos.index')}}"><i class="fas fa-backward"></i> Regresar</a>

                </div>
            </div>
        </form>
        @include('admin.users.tables.projects')

    </div>
</div>
@endsection
