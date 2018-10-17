@extends('layouts.app')

@section('content')
<div class="card w-80">
    <div class="card-header bg-primary">Reportar Incidencia</div>

    <div class="card-body">
        @include('common.errors')
        <form action="{{route('incidencias.update',$incidencia->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group col-md-4">
                <label for="category_id">Categoría</label>
                <select name="category_id" id="category_id" class="form-control">
                    @foreach ($categories as $category)
                      <option value="{{$category->id}}" @if($incidencia->category && $incidencia->category->id == $category->id) selected @endif>
                        {{$category->name}}
                      </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="severity">Severidad</label>
                <select name="severity" id="severity" class="form-control">
                    <option value="M" @if($incidencia->severity == 'M') selected @endif>Menor</option>
                    <option value="N" @if($incidencia->severity == 'N') selected @endif>Normal</option>
                    <option value="A" @if($incidencia->severity == 'A') selected @endif>Alta</option>
                </select>
            </div>
            <div class="form-group col-md-8">
                <label for="title">Título</label>
                <input type="text" class="form-control" name="title" id="title" value="{{old('title',$incidencia->title)}}">
            </div>
            <div class="form-group col-md-10">
                <label for="description">Descripción</label>
                <textarea name="description" id="description" class="form-control">{{old('description',$incidencia->description)}}</textarea>
            </div>
            <div class="form-group col-md-4 mx-auto">
                <button class="btn btn-primary btn-sm">Actualizar</button>
                <a href="{{route('incidencias.show',$incidencia->id)}}" class="btn btn-info btn-sm">Regresar</a>
            </div>
        </form>
    </div>
</div>
@endsection
