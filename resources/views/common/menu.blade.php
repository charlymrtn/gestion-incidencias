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
                        <a href="{{route('incidencias.index')}}"
                        @if(request()->is('incidencias.index')) class="nav-link active" @else class="nav-link" @endif>Ver incidencias</a>
                    </li>
                @endif
                <li class="nav-item">
                    <a href="{{route('incidencias.create')}}"
                    @if(request()->is('incidencias/crear')) class="nav-link active" @else class="nav-link" @endif>Reportar incidencia</a>
                </li>
                @if (Auth::user()->is_admin)
                    <li role="presentation" class="nav- item dropdown">
                        <a @if(request()->is('usuarios') || request()->is('proyectos') || request()->is('config'))
                            class="nav-link dropdown-toggle active"
                            @else
                            class="nav-link dropdown-toggle"
                            @endif
                        data-toggle="dropdown">Administración
                        <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li class="nav-item">
                                <a href="{{route('usuarios.index')}}" class="nav-link">Usuarios</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('proyectos.index')}}" class="nav-link">Proyectos</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('config')}}" class="nav-link">Configuración</a>
                            </li>
                        </ul>
                    </li>
                @endif
            @else
                <li class="nav-item"><a href="#" class="nav-link">Bienvenidos</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Instrucciones</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Créditos</a></li>
            @endif
        </ul>
    </div>
</div>

