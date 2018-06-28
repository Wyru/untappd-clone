<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/common.css') }}" rel="stylesheet">

    <style>
        .search{
            border: 0;
            width: 242px;
            padding: 8px 0px 8px 8px;
            font-size: 1em;
            border-radius: 4px;
            font-weight: 400;
            padding-top: 9px;
            box-shadow: none;
            padding-right: 32px;
            outline: 0;
        }

        .search-icon > span{
            background-color: white;
            border: none;
        }

        .dropdown-toggle:after{
            display: none;
        }

        
    
    </style>
    @yield('css')
</head>
<body style="background-color:#F5F2E8;">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel" style="background-color: #ffcc00">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}" style="color:white">
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

                            <li class="nav-item dropdown" style="margin-right: 20px;">
                                <a id="navbarDropdown" style="padding:0;" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <img src="{{asset('/img/default_avatar.jpg')}}" class="rounded-circle" style="height: 40px;">
                                </a>

                                <div class="dropdown-menu dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{route('home')}}">Atividades Recentes</a>
                                    <a class="dropdown-item" href="{{route('users.show', Auth::user()->id)}}"> Meu Perfil</a>
                                    <a class="dropdown-item" href="{{route('users.edit', Auth::user()->id)}}">Configurações da Conta</a>
                                    <a class="dropdown-item" href="#">Check in</a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        Desconectar
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            <li>
                                <div class="input-group">
                                    <input type="text" class="search" placeholder="Ache uma cerveja, bar ou cervejaria" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                    <div class="input-group-append search-icon">
                                        <span class="input-group-text" id="basic-addon2"><i class="fas fa-search"></i></span>
                                    </div>
                                </div>
                            </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @yield('scripts')
</body>
</html>
