<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">


</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm " style=" display: block;">

            <div class="nav nav-tabs" id="nav-tab" role="tablist" style="position: relative;">
                <a class="navbar-brand" style="position: relative; left: 1.5%" href="{{ url('/dashboard') }}">
                    <img style="width: 40px; "
                        src="https://upload.wikimedia.org/wikipedia/commons/1/1e/RPC-JP_Logo.png">
                </a>
                @if(Auth::user() !== null)
                <div class="navbar" style="position: absolute; left: 5%">
                    <a class="nav-item nav-link active" style="color:#696969" id="nav-home-tab"
                        href="{{ route('user.dashboard') }}" role="tab" aria-controls="nav-home"
                        aria-selected="true">Inicio</a>
                    @if(Auth::user()->user_type == 'admin')
                    <a class="nav-item nav-link" style="color:#696969" id="nav-profile-tab"
                        href="{{ route('user.index') }}" role="tab" aria-controls="nav-profile"
                        aria-selected="false">Usúarios</a>
                    @endif()
                    <a class="nav-item nav-link" style="color:#696969" id="nav-contact-tab"
                        href="{{ route('instituition.index') }}" role="tab" aria-controls="nav-contact"
                        aria-selected="false">Instituições</a>
                    <a class="nav-item nav-link" style="color:#696969" id="nav-contact-tab"
                        href="{{ route('group.index') }}" role="tab" aria-controls="nav-contact"
                        aria-selected="false">Grupos</a>
                    <a class="nav-item nav-link" style="color:#696969" id="nav-contact-tab"
                        href="{{ route('moviment.application') }}" role="tab" aria-controls="nav-contact"
                        aria-selected="false">Investir</a>
                    <a class="nav-item nav-link" style="color:#696969" id="nav-contact-tab"
                        href="{{ route('moviment.getback') }}" role="tab" aria-controls="nav-contact"
                        aria-selected="false">Resgatar</a>
                    <a class="nav-item nav-link" style="color:#696969" id="nav-contact-tab"
                        href="{{ route('moviment.index') }}" role="tab" aria-controls="nav-contact"
                        aria-selected="false">Aplicações</a>
                    <a class="nav-item nav-link" style="color:#696969" id="nav-contact-tab"
                        href="{{ route('moviment.all') }}" role="tab" aria-controls="nav-contact"
                        aria-selected="false">Extrato</a>
                    @endif
                </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                <ul class="navbar-nav ml-auto" style="position: absolute; left: 90%">
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Entrar') }}</a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Registrar') }}</a>
                    </li>
                    @endif
                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Sair') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>

                    @endguest
                </ul>

                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
    </div>

    {{-- @if(Auth::user() !== null)
        <nav id="principal">
            <ul>
        
                <li>
                    <a href="{{ route('user.dashboard') }}">
    <i class="fa fa-home"></i>
    <h3>Início</h3>
    </a>
    </li>
    @if(Auth::user()->user_type == 'admin')
    <li>
        <a href="{{ route('user.index') }}">
            <i class="fa fa-address-book"></i>
            <h3>Usuários</h3>
        </a>
    </li>
    @endif()
    <li>
        <a href="{{ route('instituition.index') }}">
            <i class="fa fa-building"></i>
            <h3>Instituições</h3>
        </a>
    </li>
    <li>
        <a href="{{ route('group.index') }}">
            <i class="fa fa-users"></i>
            <h3>Grupos</h3>
        </a>
    </li>
    <li>
        <a href="{{ route('moviment.application') }}">
            <i class="fa fa-money "></i>
            <h3>Investir</h3>
        </a>
    </li>
    <li>
        <a href="{{ route('moviment.getback') }}">
            <i class="fa fa-handshake-o"></i>
            <h3>Resgatar</h3>
        </a>
    </li>
    <li>
        <a href="{{ route('moviment.index') }}">
            <i class="fa fa-dollar"></i>
            <h3>Aplicações</h3>
        </a>
    </li>
    <li>
        <a href="{{ route('moviment.all') }}">
            <i class="fa fa-bank "></i>
            <h3>Extrato</h3>
        </a>
    </li>

    </ul>
    </nav>
    @endif --}}
    <main class="py-4">
        @yield('content')
    </main>

    </div>

</body>

</html>