<!-- Modal -->
<div class="modal fade" id="editLevel{{$level->id}}" tabindex="-1" role="dialog" aria-labelledby="editLevelLabel{{$level->id}}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editLevelLabel{{$level->id}}">Editar nivel {{$level->name}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{route('niveles.update',$level->id)}}">
            @csrf
            @method('PUT')

            <div class="form group">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" name="name" id="name" value="{{old('name',$level->name)}}">
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
