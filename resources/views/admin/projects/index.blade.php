@extends('layouts.app')

@section('css')

@endsection

@section('scripts')

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
                <textarea class="form-control" name="description" id="description" cols="34">{{old('description')}}</textarea>
            </div>
            <div class="form-group col-md-5 ml-auto">
                <label for="start_date">Fecha de Inicio</label>
                <input type="date" name="start_date" id="start_date" class="form-control" value="{{old('start_date',date('Y-m-d'))}}">
            </div>
            <div class="form-group col-md-4 ml-auto">
                <button class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Guardar Proyecto</button>
            </div>
        </form>
        @include('admin.tables.projects')
    </div>
</div>

@foreach ($projects as $project)
    @if($project->trashed())
        @include('modals.active-project')
    @else
        @include('modals.delete-project')
    @endif
@endforeach

@endsection
