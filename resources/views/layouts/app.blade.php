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

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/dashboard') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        @if(Auth::user() !== null)
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
        @endif
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    
</body>
</html>
