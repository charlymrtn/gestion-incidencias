<div class="card w-80">
  <div class="card-header bg-info">
      Comentarios
  </div>
  <div class="card-body bg-light">
    @include('common.notifications')
    @include('common.errors')
    <ul class="media-list">
      @foreach ($messages as $message)
        <li class="media">
          <div class="media-body">
            <div class="media">
              <a href="#" class="float-left">
                <img class="mr-3 rounded-circle" src="{{asset($message->user->image_path)}}" width="40" alt="imagen avatar">
              </a>
              <div class="media-body">
                {{$message->message}}
                <br>
                <small class="text-muted">{{$message->user_name}} | {{$message->created_format}}</small>
              </div>
            </div>
          </div>
        </li>
      @endforeach
    </ul>

  </div>
  <div class="card-footer bg-secondary">
    <form class="" action="{{route('mensajes.store')}}" method="POST">
      {{ csrf_field() }}
      <input type="hidden" name="incident_id" value="{{$bug->id}}">
      <div class="input-group">
          <input class="form-control" type="text" name="message" value="{{old('message')}}">
          <span class="input-group-append">
            <button class="btn btn-primary btn-sm" type="submit">Enviar</button>
          </span>
      </div>
    </form>
  </div>
</div>
