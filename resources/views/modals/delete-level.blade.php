<!-- Modal -->
<div class="modal fade" id="deleteLevel{{$level->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteLevelLabel{{$level->id}}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteLevelLabel{{$level->id}}">Dar de baja nivel {{$level->name}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          ¿Seguro deseas dar de baja el nivel {{$level->name}}?
        <form method="POST" action="{{route('niveles.destroy',$level->id)}}">
            @csrf
            @method('DELETE')

            <button type="button" class="btn btn-info btn-sm" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-danger btn-sm" title="Dar de baja">
                Aceptar
            </button>
        </form>
      </div>
    </div>
  </div>
</div>
