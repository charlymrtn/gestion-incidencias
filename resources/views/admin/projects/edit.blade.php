@extends('layouts.app')

@section('css')

@endsection

@section('scripts')

@endsection

@section('content')
<div class="card w-80">
    <div class="card-header">Editar Proyecto</div>

    <div class="card-body">
        @include('common.errors')
        @include('common.notifications')
        <form action="{{route('proyectos.update',$proyecto->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group col-md-5">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" name="name" id="name" value="{{old('name',$proyecto->name)}}">
            </div>
            <div class="form-group col-md-5">
                <label for="description">Descripción</label>
                <textarea class="form-control" name="description" id="description" cols="34">{{old('description',$proyecto->description)}}</textarea>
            </div>
            <div class="form-group col-md-5">
                <label for="start_date">Fecha de Inicio</label>
                <input type="date" name="start_date" id="start_date" class="form-control" value="{{old('start_date',$proyecto->start_string)}}">
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
        @include('admin.projects.tables.levels-categories')

    </div>
</div>

@if($categorias)
    @foreach($categorias as $category)
        @include('modals.edit-category')
        @include('modals.delete-category')
    @endforeach
@endif
@if($niveles)
    @foreach($niveles as $level)
        @include('modals.edit-level')
        @include('modals.delete-level')
    @endforeach
@endif

@endsection
