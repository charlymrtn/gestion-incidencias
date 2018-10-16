<!-- Modal -->
<div class="modal fade" id="editRelation{{$p_user->id}}" tabindex="-1" role="dialog" aria-labelledby="editRelationLabel{{$p_user->id}}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editRelationLabel{{$p_user->id}}">Editar relación con proyecto {{$p_user->project->name}} y nivel {{$p_user->level->name}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{route('usuarios.proyectos.update',$p_user->id)}}">
            @csrf
            @method('PUT')

            <div class="form group">
                <label for="name">Nivel</label>
                <select name="level_id" id="levels" class="form-control">
                    @foreach ($p_user->project->levels as $level)
                        @if ($p_user->level_id == $level->id)
                            <option value="{{$level->id}}" selected>{{$level->name}}</option>
                        @else
                            <option value="{{$level->id}}">{{$level->name}}</option>     
                        @endif
                    @endforeach
                </select>
            </div>

            <button type="button" class="btn btn-info btn-sm" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-success btn-sm" title="Editar">
                Aceptar
            </button>
        </form>
      </div>
    </div>
  </div>
</div>
