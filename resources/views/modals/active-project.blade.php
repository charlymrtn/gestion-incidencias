<!-- Modal -->
<div class="modal fade" id="activeProject{{$project->id}}" tabindex="-1" role="dialog" aria-labelledby="activeProjectLabel{{$project->id}}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="activeProjectLabel{{$project->id}}">Activar proyecto {{$project->name}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          ¿Seguro deseas activar el proyecto {{$project->name}}?
          <br>
            <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Cancelar</button>
            <a class="btn btn-success btn-sm" title="Activar" href="{{route('proyectos.active',$project->id)}}">
                Aceptar
            </a>
      </div>
    </div>
  </div>
</div>
