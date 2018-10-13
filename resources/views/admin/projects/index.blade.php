@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
@endsection

@section('scripts')
    <script defer src="https://use.fontawesome.com/releases/v5.4.1/js/all.js" integrity="sha384-L469/ELG4Bg9sDQbl0hvjMq8pOcqFgkSpwhwnslzvVVGpDjYJ6wJJyYjvG3u8XW7" crossorigin="anonymous"></script>
@endsection

@section('content')
<div class="card w-80">
    <div class="card-header">Proyectos</div>

    <div class="card-body">
        @include('common.errors')
        @include('common.notifications')
        <form action="{{route('proyectos.store')}}" method="POST">
            @csrf
            <div class="form-group col-md-5 ml-auto">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}">
            </div>
            <div class="form-group col-md-5 ml-auto">
                <label for="description">Descripción</label>
                <textarea name="description" id="description" cols="34">{{old('description')}}</textarea>
            </div>
            <div class="form-group col-md-5 ml-auto">
                <label for="start">Fecha de Inicio</label>
                <input type="date" class="form-control" name="start" id="start" value="{{old('start',date('Y-m-d'))}}">
            </div>
            <div class="form-group col-md-4 ml-auto">
                <button class="btn btn-primary btn-sm"><i class="fas fa-user-plus"></i> Guardar Proyecto</button>
            </div>
        </form>
        @include('admin.tables.projects')
    </div>
</div>

@foreach ($projects as $project)
    @include('modals.delete-project')
@endforeach

@endsection
