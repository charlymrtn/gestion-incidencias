@extends('layouts.app')

@section('content')
<div class="card w-80">
    <div class="card-header">
        Incidencia {{$bug->title}} <br> <a href="{{route('home')}}" class="btn btn-primary btn-sm">Regresar</a>
    </div>

    <div class="card-body bg-light">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Proyecto</th>
                    <th>Categoría</th>
                    <th>Fecha de envío</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$bug->id}}</td>
                    <td>{{$bug->project->name}}</td>
                    <td>{{$bug->category_name}}</td>
                    <td>{{$bug->created}}</td>
                </tr>
            </tbody>
            <thead>
                <tr>
                    <th>Asignado a</th>
                    <th>Creado Por</th>
                    <th>Visibilidad</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$bug->support_name}}</td>
                    <td>{{$bug->client_name}}</td>
                    <td>Público</td>
                    <td>{{$bug->state}}</td>

                </tr>
            </tbody>
        </table>
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th>Resumen</th>
                    <td>{{$bug->title}}</td>
                </tr>
                <tr>
                    <th>Severidad</th>
                    <td>{{$bug->severity_name}}</td>
                </tr>
                <tr>
                    <th>Descripción</th>
                    <td>{{$bug->description}}</td>
                </tr>
                <tr>
                    <th>Adjuntos</th>
                    <td></td>
                </tr>
            </tbody>
        </table>
        @if(!$bug->support && Auth::user()->is_support && $bug->state_id != 2)
            <button class="btn btn-primary btn-sm">Atender Incidencia</button>
        @endif

        @if($bug->client_id == Auth::user()->id)
            @if($bug->state_id == 2)
                <button class="btn btn-info btn-sm">Volver a abrir la incidencia</button>
            @endif
            @if($bug->state_id != 2)
                <button class="btn btn-success btn-sm">Marcar como resuelto</button>
            @endif
            <button class="btn btn-warning btn-sm">Editar la incidencia</button>
        @endif

        @if($bug->support && $bug->support->id == Auth::user()->id && $bug->state_id != 2)
            <button class="btn btn-danger btn-sm">Derivar al siguiente nivel</button>
        @endif
    </div>
</div>
@endsection
