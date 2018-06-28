<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            .untappd-link{
                border: 2px solid white;
                padding: 10px;
                border-radius: 5px;
            }


            .untappd-link:hover{
                border: 2px solid white;
                padding: 10px;
                border-radius: 5px;
                background-color: whitesmoke;
                color: black;
                transition: 200ms;
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
            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
                display: flex;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
                color: whitesmoke;
            }

            .links > a {
                color: whitesmoke;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;

            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ route('feed') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}"><div class="untappd-link">Entrar</div></a>
                        <a href="{{ route('register') }}"><div class="untappd-link" >Criar Conta</div></a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Untappd-clone
                </div>
            </div>
        </div>
    </body>
</html>
