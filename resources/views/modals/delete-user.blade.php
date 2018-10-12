
<!-- Modal -->
<div class="modal fade" id="deleteUser{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteUserLabel{{$user->id}}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteUserLabel{{$user->id}}">Dar de baja usuario {{$user->name}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          ¿Seguro deseas dar de baja al usuario {{$user->name}}?
        <form method="POST" action="{{route('usuarios.destroy',$user->id)}}">
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
