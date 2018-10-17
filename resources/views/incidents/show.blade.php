@extends('layouts.app')

@section('content')
<div class="card w-80">
    <div class="card-header bg-primary">
        Incidencia {{$bug->title}} <br> <a href="{{URL::previous()}}" class="btn btn-warning btn-sm">Regresar</a>
    </div>

    <div class="card-body bg-light">
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
        @include('common.buttons-modals')
    </div>
</div>
@include('layouts.chat')
@endsection
