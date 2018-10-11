@extends('layouts.app')

@section('content')
<div class="card w-80">
    <div class="card-header">Reportar Incidencia</div>

    <div class="card-body">
        <form action="">
            <div class="form-group col-md-4">
                <label for="category_id">Categoría</label>
                <select name="category_id" id="category_id" class="form-control">

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
                <input type="text" class="form-control" name="title" id="title">
            </div>
            <div class="form-group col-md-10">
                <label for="description">Descripción</label>
                <textarea name="description" id="description" class="form-control"></textarea>
            </div>
            <div class="form-group col-md-4 mx-auto">
                <button class="btn btn-primary">Registrar</button>
            </div>
        </form>
    </div>
</div>
@endsection