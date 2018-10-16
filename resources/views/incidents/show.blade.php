@extends('layouts.app')

@section('content')
<div class="card w-80">
    <div class="card-header bg-primary">
        Incidencia {{$bug->title}} <br> <a href="{{route('home')}}" class="btn btn-warning btn-sm">Regresar</a>
    </div>

    <div class="card-body bg-light">
        @include('common.notifications')
        <table class="table table-bordered">
            <thead>
                <tr class="bg-dark">
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
                <tr class="bg-dark">
                    <th>Asignado a</th>
                    <th>Creado Por</th>
                    <th>Nivel de Atención</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$bug->support_name}}</td>
                    <td>{{$bug->client_name}}</td>
                    <td>{{$bug->level_name}}</td>
                    <td @if($bug->state_id == 2) class="bg-success" @elseif(($bug->state_id == 1)) class="bg-info" @else class="bg-warning" @endif>
                        {{$bug->state}}
                    </td>

                </tr>
            </tbody>
        </table>
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th class="bg-dark">Resumen</th>
                    <td>{{$bug->title}}</td>
                </tr>
                <tr>
                    <th class="bg-dark">Severidad</th>
                    <td>{{$bug->severity_name}}</td>
                </tr>
                <tr>
                    <th class="bg-dark">Descripción</th>
                    <td>{{$bug->description}}</td>
                </tr>
                <tr>
                    <th class="bg-dark">Adjuntos</th>
                    <td></td>
                </tr>
            </tbody>
        </table>
        @if(!$bug->support && Auth::user()->is_support && $bug->state_id != 2)
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#takeIncident{{$bug->id}}">
                Atender incidencia
            </button>
        @endif

        @if($bug->client_id == Auth::user()->id)
            @if($bug->state_id == 2)
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#openIncident{{$bug->id}}">
                    Volver a abrir la incidencia
                </button>
            @else
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#solveIncident{{$bug->id}}">
                    Marcar como resuelto
                </button>
            @endif
            <a href="{{route('incidencias.edit',$bug->id)}}" class="btn btn-warning btn-sm">Editar la incidencia</a>
        @endif

        @if($bug->support && $bug->support->id == Auth::user()->id && $bug->state_id != 2)
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#nextIncident{{$bug->id}}">
                Derivar al siguiente nivel
            </button>
        @endif
    </div>
</div>
@if(!$bug->support && Auth::user()->is_support && $bug->state_id != 2)
    @include('modals.take-incident')
@endif

@if($bug->client_id == Auth::user()->id)
    @if($bug->state_id == 2)
        @include('modals.open-incident')
    @else
        @include('modals.solve-incident')
    @endif
@endif

@if($bug->support && $bug->support->id == Auth::user()->id && $bug->state_id != 2)
    @include('modals.next-incident')
@endif

@endsection
