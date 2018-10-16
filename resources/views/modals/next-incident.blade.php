<!-- Modal -->
<div class="modal fade" id="nextIncident{{$bug->id}}" tabindex="-1" role="dialog" aria-labelledby="nextIncidentLabel{{$bug->id}}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="nextIncidentLabel{{$bug->id}}">Derivar incidencia {{$bug->title}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          ¿Seguro deseas derivar la incidencia {{$bug->title}}?
          <br>
            <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Cancelar</button>
            <a class="btn btn-success btn-sm" title="Derivar" href="{{route('incidencias.next',$bug->id)}}">
                Aceptar
            </a>
      </div>
    </div>
  </div>
</div>
