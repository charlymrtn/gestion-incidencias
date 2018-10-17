<!-- Modal -->
<div class="modal fade" id="prevIncident{{$bug->id}}" tabindex="-1" role="dialog" aria-labelledby="prevIncidentLabel{{$bug->id}}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="prevIncidentLabel{{$bug->id}}">Regresar incidencia {{$bug->title}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          ¿Seguro deseas regresar la incidencia {{$bug->title}}?
          <br>
            <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Cancelar</button>
            <a class="btn btn-success btn-sm" title="Derivar" href="{{route('incidencias.prev',$bug->id)}}">
                Aceptar
            </a>
      </div>
    </div>
  </div>
</div>
