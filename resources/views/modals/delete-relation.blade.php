<!-- Modal -->
<div class="modal fade" id="deleteRelation{{$p_user->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteRelationLabel{{$p_user->id}}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteRelationLabel{{$p_user->id}}">Dar de baja relación {{$p_user->level->name}} con {{$p_user->project->name}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          ¿Seguro deseas dar de baja la asignación {{$p_user->level->name}} en el proyecto {{$p_user->project->name}}?
        <form method="POST" action="{{route('usuarios.proyectos.destroy',$p_user->id)}}">
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
