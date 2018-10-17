@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header bg-primary">Incidencias en el sistema.</div>

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        @include('common.errors')
        @include('common.notifications')

        <div class="card bg-light mb-3">
            <div class="card-header bg-primary">Tenemos un total de <strong>{{$incidencias->count()}}</strong> incidencias</div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Categoría</th>
                            <th>Severidad</th>
                            <th>Estado</th>
                            <th>Nivel de Atención</th>
                            <th>Fecha Creación</th>
                            <th>Responsable</th>
                        </tr>
                    </thead>
                    <tbody id="panel_reported_bugs">
                        @foreach ($incidencias as $bug)
                            <tr @if($bug->state_id == 2) class="bg-success" @elseif(($bug->state_id == 1)) class="bg-info" @else class="bg-warning" @endif>
                                <td><a href="{{route('incidencias.show',$bug->id)}}">{{$bug->title}}</a></td>
                                <td>{{$bug->category_name}}</td>
                                <td>{{$bug->severity_name}}</td>
                                <td>{{$bug->state}}</td>
                                <td>{{$bug->level_name}}</td>
                                <td>{{$bug->created}}</td>
                                <td>{{$bug->support_name}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
