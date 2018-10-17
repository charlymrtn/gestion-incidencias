@if(!$bug->support && Auth::user()->is_support && $bug->state_id != 2 && Auth::user()->canTake($bug))
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
        <a href="{{route('incidencias.edit',$bug->id)}}" class="btn btn-warning btn-sm">Editar la incidencia</a>
    @endif
@endif

@if($bug->support && $bug->support->id == Auth::user()->id && $bug->state_id != 2)
    @if(!$bug->max_level)
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#nextIncident{{$bug->id}}">
            Derivar al siguiente nivel
        </button>
    @endif
    @if($bug->prev_level_id || $bug->max_level)
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#prevIncident{{$bug->id}}">
            Derivar al nivel previo
        </button>
    @endif
@endif

@if(!$bug->support && Auth::user()->is_support && $bug->state_id != 2 && Auth::user()->levels->contains('level_id',$bug->level->id))
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
  @if(!$bug->max_level)
    @include('modals.next-incident')
  @endif

  @if($bug->prev_level_id || $bug->max_level)
    @include('modals.prev-incident')
  @endif
@endif
