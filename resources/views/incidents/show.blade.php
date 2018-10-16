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
                    <td></td>

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
        @if(!Auth::user()->is_client && !$bug->support)
            <button class="btn btn-primary btn-sm">Atender Incidencia</button>
        @endif
    </div>
</div>
@endsection
