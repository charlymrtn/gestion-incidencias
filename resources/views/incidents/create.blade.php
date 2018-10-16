@extends('layouts.app')

@section('content')
<div class="card w-80">
    <div class="card-header">Reportar Incidencia</div>

    <div class="card-body">
        @include('common.errors')
        <form action="{{route('incidencias.store')}}" method="POST">
            @csrf
            <div class="form-group col-md-4">
                <label for="category_id">Categoría</label>
                <select name="category_id" id="category_id" class="form-control">
                    <option value="">General</option>
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>

                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="severity">Severidad</label>
                <select name="severity" id="severity" class="form-control">
                    <option value="M">Menor</option>
                    <option value="N">Normal</option>
                    <option value="A">Alta</option>
                </select>
            </div>
            <div class="form-group col-md-8">
                <label for="title">Título</label>
                <input type="text" class="form-control" name="title" id="title" value="{{old('title')}}">
            </div>
            <div class="form-group col-md-10">
                <label for="description">Descripción</label>
                <textarea name="description" id="description" class="form-control">{{old('description')}}</textarea>
            </div>
            <div class="form-group col-md-4 mx-auto">
                <button class="btn btn-primary btn-sm">Registrar</button>
                <a href="{{route('home')}}" class="btn btn-info btn-sm">Regresar</a>
            </div>
        </form>
    </div>
</div>
@endsection
