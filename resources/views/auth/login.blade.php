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

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        .button-yellow {
            color: #fff;
            background-color: #D8AD00;
        }

        .button-yellow:hover {
            color: #fff;
            background-color: #f4b800;
        }

        .title{
            font-size: 30px;
            font-weight: bolder;
        }

        .subtitle{
            font-weight: lighter;
            font-size: 10px;
            margin-top: -10px;
        }
        html{
            background-color: transparent;
            background-image: url({{asset('/img/background.jpg')}});
            background-size: cover;
            background-position-x: center;
            background-position-y: center;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        body{
            background-color: rgba(0, 0, 0, .5);
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }
    </style>
</head>
<body>
    <div id="app">
        <main class="py-4">
            <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="card" style="margin-top:10%;">
                                <div class="card-body">
                                    <div class="text-center mb-3">
                                        <div class="title">
                                            UNTAPPD
                                        </div>
                                        <div class="subtitle">
                                            DRINK SOCIALLY
                                        </div>
                                    </div>
                                    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                                        @csrf
                
                                        <div class="form-group row">
                                            
                                            <div class="offset-1 col-md-10">
                                                <input placeholder="Email" id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                
                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                
                                        <div class="form-group row mb-5">
                                            
                                            <div class="offset-md-1 col-md-10 ">
                                                <input placeholder="Senha" id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                
                                                @if ($errors->has('password'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                
                                        <div class="form-group row mb-0">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-10">
                                                <button type="submit" class="btn button-yellow btn-block">
                                                    Entrar
                                                </button>
                                            </div>
                                        </div>
                                    </form>

                                    <div class="row mt-1 p-1">
                                        <div class="col-md-1"></div>
                                        
                                        <div class="col-md-10 text-center p-2" style="border-top: 1px solid rgba(0,0,0,.5);">
                                            Novo por aqui? <a href="{{route('register')}}">Registre-se</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </main>
    </div>
</body>
</html>
