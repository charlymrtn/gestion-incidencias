<nav class="navbar navbar-expand-md navbar-light navbar-laravel bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                @if (Auth::check())
                    <form action="" class="navbar-form">
                        <div class="form-group">
                            <select class="form-control" name="list_project" id="list_project">
                                <option value="">Selecciona un proyecto</option>
                                @if (Auth::user()->is_support)
                                    @foreach (Auth::user()->projects as $project)
                                        @if (Auth::user()->selected_project_id && (Auth::user()->selected_project_id == $project->id))
                                            <option value="{{$project->id}}" selected>{{$project->name}}</option>
                                        @else
                                            <option value="{{$project->id}}">{{$project->name}}</option>
                                        @endif
                                    @endforeach
                                @else
                                    @foreach (Auth::user()->project_list as $project)
                                        @if (Auth::user()->selected_project_id && (Auth::user()->selected_project_id == $project->id))
                                            <option value="{{$project->id}}" selected>{{$project->name}}</option>
                                        @else
                                            <option value="{{$project->id}}">{{$project->name}}</option>
                                        @endif
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </form>
                @endif
            </ul>
            @include('common.errors')
            @include('common.notifications')

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Ingresar') }}</a>
                    </li>
                    <li class="nav-item">
                        @if (Route::has('register'))
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                        @endif
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Salir') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
