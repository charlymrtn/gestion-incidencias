<div class="card">
    <div class="card-header">Menú</div>

    <div class="card-body">
        <div class="nav nav-pills nav-stacked">
            @if (Auth::check())
                <li><a href="{{route('home')}}" class="list-group-item">Panel Principal</a></li>
                <li><a href="#" class="list-group-item">Ver incidencias</a></li>
                <li><a href="{{route('reportar')}}" class="list-group-item">Reportar incidencia</a></li>
                <li><a href="#" class="list-group-item">Administración</a></li>
            @else
                <li><a href="#" class="list-group-item">Bienvenidos</a></li>
                <li><a href="#" class="list-group-item">Instrucciones</a></li>
                <li><a href="#" class="list-group-item">Créditos</a></li>
            @endif

        </div>
    </div>
</div>

