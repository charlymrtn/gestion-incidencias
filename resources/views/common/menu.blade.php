<div class="card">
    <div class="card-header">Menú</div>

    <div class="card-body">
        <div class="nav nav-pills nav-stacked">
            @if (Auth::check())
                <li><a href="{{route('home')}}" class="list-group-item">Panel Principal</a></li>
                <li><a href="#" class="list-group-item">Ver incidencias</a></li>
                <li><a href="{{route('reportar')}}" class="list-group-item">Reportar incidencia</a></li>
                @if (Auth::user()->user_type == 'A')
                    <li role="presentation" class="list-group-item dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Administración
                        <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('usuarios')}}">Usuarios</a></li>
                            <li><a href="{{route('proyectos')}}">Proyectos</a></li>
                            <li><a href="{{route('config')}}">Configuración</a></li>
                        </ul>
                    </li>
                @endif
            @else
                <li><a href="#" class="list-group-item">Bienvenidos</a></li>
                <li><a href="#" class="list-group-item">Instrucciones</a></li>
                <li><a href="#" class="list-group-item">Créditos</a></li>
            @endif

        </div>
    </div>
</div>

