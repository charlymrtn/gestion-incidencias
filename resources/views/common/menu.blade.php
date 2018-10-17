<div class="card">
    <div class="card-header bg-primary">Menú</div>

    <div class="card-body">
        <ul class="nav nav-pills nav-stacked">
            @if (Auth::check())
                <li class="nav-item">
                    <a href="{{route('home')}}"
                    @if(request()->is('home')) class="nav-link active" @else class="nav-link" @endif>Panel Principal</a>
                </li>
                @if (Auth::user()->is_admin)
                    <li class="nav-item">
                        <a href="{{route('incidencias.index')}}"
                        @if(request()->is('incidencias.index')) class="nav-link active" @else class="nav-link" @endif>Ver incidencias</a>
                    </li>
                @endif
                @if (Auth::user()->is_client || Auth::user()->is_admin)
                <li class="nav-item">
                    <a href="{{route('incidencias.create')}}"
                    @if(Route::is('incidencias.create')) class="nav-link active" @else class="nav-link" @endif>Reportar incidencia</a>
                </li>
                @endif
                @if (Auth::user()->is_support && (Auth::user()->projects->count() > 0))
                <li class="nav-item">
                    <a href="{{route('incidencias.create')}}"
                    @if(Route::is('incidencias.create')) class="nav-link active" @else class="nav-link" @endif>Reportar incidencia</a>
                </li>
                @endif
                @if (Auth::user()->is_admin)
                    <li role="presentation" class="nav- item dropdown">
                            <a @if(Request::is('usuarios/*') || Request::is('proyectos/*') || Request::is('config/*') || Route::is('usuarios.index') || Route::is('proyectos.index') || Route::is('config'))
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
                <li class="nav-item">
                    <a href="{{route('login')}}" class="nav-link">Entrar</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('register')}}" class="nav-link">Registrarse</a>
                </li>
                <li class="nav-item">
                    <a href="https://github.com/charlymrtn" target="_blank" class="nav-link">Créditos</a>
                </li>
            @endif
        </ul>
    </div>
</div>
