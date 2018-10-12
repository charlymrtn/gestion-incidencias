<div class="card">
    <div class="card-header">Menú</div>

    <div class="card-body">
        <ul class="nav nav-pills nav-stacked">
            @if (Auth::check())
                <li class="nav-item">
                    <a href="{{route('home')}}"
                    @if(request()->is('home')) class="nav-link active" @else class="nav-link" @endif>Panel Principal</a>
                </li>
                @if (!Auth::user()->is_client)
                    <li class="nav-item">
                        <a href="{{route('incidencias')}}"
                        @if(request()->is('incidencias')) class="nav-link active" @else class="nav-link" @endif>Ver incidencias</a>
                    </li>
                @endif
                <li class="nav-item">
                    <a href="{{route('reportar')}}"
                    @if(request()->is('reportar')) class="nav-link active" @else class="nav-link" @endif>Reportar incidencia</a>
                </li>
                @if (Auth::user()->is_admin)
                    <li role="presentation" class="nav- item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown">Administración
                        <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li class="nav-item">
                                <a href="{{route('usuarios')}}" class="nav-link">Usuarios</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('proyectos')}}" class="nav-link">Proyectos</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('config')}}" class="nav-link">Configuración</a>
                            </li>
                        </ul>
                    </li>
                @endif
            @else
                <li><a href="#" class="list-group-item">Bienvenidos</a></li>
                <li><a href="#" class="list-group-item">Instrucciones</a></li>
                <li><a href="#" class="list-group-item">Créditos</a></li>
            @endif
        </ul>
    </div>
</div>

