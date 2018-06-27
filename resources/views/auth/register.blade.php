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
                                    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                                        @csrf
                
                                            <div class="form-group row">
                                                <div class=" col-md-6">
                                                    <input placeholder="Nome de usuário" id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>
                    
                                                    @if ($errors->has('username'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('username') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class=" col-md-6">
                                                    <input placeholder="Email" id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                    
                                                    @if ($errors->has('email'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                    
                    
                                            <div class="form-group row mb-5">
                    
                                                <div class="col-md-6">
                                                    <input placeholder="Senha" id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                    
                                                    @if ($errors->has('password'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('password') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>

                                                <div class="col-md-6">
                                                        <input placeholder="Confirmar Senha" id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                                </div>
                                            </div>


                                            <div class="form-group row">
                    
                                                <div class="col-md-6">
                                                    <input placeholder="Nome" id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" required>
                    
                                                    @if ($errors->has('first_name'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('first_name') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>

                                                <div class="col-md-6">
                                                    <input placeholder="Sobrenome" id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" required>
                    
                                                    @if ($errors->has('last_name'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('last_name') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group row">
                    
                                                <div class="col-md-6">
                                                    <input placeholder="Localização(opicional)" id="location" type="text" class="form-control{{ $errors->has('location') ? ' is-invalid' : '' }}" name="location">
                    
                                                    @if ($errors->has('location'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('location') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>

                                                <div class="col-md-6">
                                                    <select id="gender" class="form-control{{ $errors->has('gender') ? ' is-invalid' : '' }}" name="gender" required>
                                                        <option>Masculino</option>
                                                        <option>Feminino</option>
                                                        <option>Não quero dizer</option>

                                                    </select>
                                                    @if ($errors->has('gender'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('gender') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-6">
                                                    <select id="country" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" name="country" required>
                                                            <option value="África do Sul">África do Sul</option>
                                                            <option value="Albânia">Albânia</option>
                                                            <option value="Alemanha">Alemanha</option>
                                                            <option value="Andorra">Andorra</option>
                                                            <option value="Angola">Angola</option>
                                                            <option value="Anguilla">Anguilla</option>
                                                            <option value="Antigua">Antigua</option>
                                                            <option value="Arábia Saudita">Arábia Saudita</option>
                                                            <option value="Argentina">Argentina</option>
                                                            <option value="Armênia">Armênia</option>
                                                            <option value="Aruba">Aruba</option>
                                                            <option value="Austrália">Austrália</option>
                                                            <option value="Áustria">Áustria</option>
                                                            <option value="Azerbaijão">Azerbaijão</option>
                                                            <option value="Bahamas">Bahamas</option>
                                                            <option value="Bahrein">Bahrein</option>
                                                            <option value="Bangladesh">Bangladesh</option>
                                                            <option value="Barbados">Barbados</option>
                                                            <option value="Bélgica">Bélgica</option>
                                                            <option value="Benin">Benin</option>
                                                            <option value="Bermudas">Bermudas</option>
                                                            <option value="Botsuana">Botsuana</option>
                                                            <option value="Brasil" selected>Brasil</option>
                                                            <option value="Brunei">Brunei</option>
                                                            <option value="Bulgária">Bulgária</option>
                                                            <option value="Burkina Fasso">Burkina Fasso</option>
                                                            <option value="botão">botão</option>
                                                            <option value="Cabo Verde">Cabo Verde</option>
                                                            <option value="Camarões">Camarões</option>
                                                            <option value="Camboja">Camboja</option>
                                                            <option value="Canadá">Canadá</option>
                                                            <option value="Cazaquistão">Cazaquistão</option>
                                                            <option value="Chade">Chade</option>
                                                            <option value="Chile">Chile</option>
                                                            <option value="China">China</option>
                                                            <option value="Cidade do Vaticano">Cidade do Vaticano</option>
                                                            <option value="Colômbia">Colômbia</option>
                                                            <option value="Congo">Congo</option>
                                                            <option value="Coréia do Sul">Coréia do Sul</option>
                                                            <option value="Costa do Marfim">Costa do Marfim</option>
                                                            <option value="Costa Rica">Costa Rica</option>
                                                            <option value="Croácia">Croácia</option>
                                                            <option value="Dinamarca">Dinamarca</option>
                                                            <option value="Djibuti">Djibuti</option>
                                                            <option value="Dominica">Dominica</option>
                                                            <option value="EUA">EUA</option>
                                                            <option value="Egito">Egito</option>
                                                            <option value="El Salvador">El Salvador</option>
                                                            <option value="Emirados Árabes">Emirados Árabes</option>
                                                            <option value="Equador">Equador</option>
                                                            <option value="Eritréia">Eritréia</option>
                                                            <option value="Escócia">Escócia</option>
                                                            <option value="Eslováquia">Eslováquia</option>
                                                            <option value="Eslovênia">Eslovênia</option>
                                                            <option value="Espanha">Espanha</option>
                                                            <option value="Estônia">Estônia</option>
                                                            <option value="Etiópia">Etiópia</option>
                                                            <option value="Fiji">Fiji</option>
                                                            <option value="Filipinas">Filipinas</option>
                                                            <option value="Finlândia">Finlândia</option>
                                                            <option value="França">França</option>
                                                            <option value="Gabão">Gabão</option>
                                                            <option value="Gâmbia">Gâmbia</option>
                                                            <option value="Gana">Gana</option>
                                                            <option value="Geórgia">Geórgia</option>
                                                            <option value="Gibraltar">Gibraltar</option>
                                                            <option value="Granada">Granada</option>
                                                            <option value="Grécia">Grécia</option>
                                                            <option value="Guadalupe">Guadalupe</option>
                                                            <option value="Guam">Guam</option>
                                                            <option value="Guatemala">Guatemala</option>
                                                            <option value="Guiana">Guiana</option>
                                                            <option value="Guiana Francesa">Guiana Francesa</option>
                                                            <option value="Guiné-bissau">Guiné-bissau</option>
                                                            <option value="Haiti">Haiti</option>
                                                            <option value="Holanda">Holanda</option>
                                                            <option value="Honduras">Honduras</option>
                                                            <option value="Hong Kong">Hong Kong</option>
                                                            <option value="Hungria">Hungria</option>
                                                            <option value="Iêmen">Iêmen</option>
                                                            <option value="Ilhas Cayman">Ilhas Cayman</option>
                                                            <option value="Ilhas Cook">Ilhas Cook</option>
                                                            <option value="Ilhas Curaçao">Ilhas Curaçao</option>
                                                            <option value="Ilhas Marshall">Ilhas Marshall</option>
                                                            <option value="Ilhas Turks & Caicos">Ilhas Turks & Caicos</option>
                                                            <option value="Ilhas Virgens (brit.)">Ilhas Virgens (brit.)</option>
                                                            <option value="Ilhas Virgens(amer.)">Ilhas Virgens(amer.)</option>
                                                            <option value="Ilhas Wallis e Futuna">Ilhas Wallis e Futuna</option>
                                                            <option value="Índia">Índia</option>
                                                            <option value="Indonésia">Indonésia</option>
                                                            <option value="Inglaterra">Inglaterra</option>
                                                            <option value="Irlanda">Irlanda</option>
                                                            <option value="Islândia">Islândia</option>
                                                            <option value="Israel">Israel</option>
                                                            <option value="Itália">Itália</option>
                                                            <option value="Jamaica">Jamaica</option>
                                                            <option value="Japão">Japão</option>
                                                            <option value="Jordânia">Jordânia</option>
                                                            <option value="Kuwait">Kuwait</option>
                                                            <option value="Latvia">Latvia</option>
                                                            <option value="Líbano">Líbano</option>
                                                            <option value="Liechtenstein">Liechtenstein</option>
                                                            <option value="Lituânia">Lituânia</option>
                                                            <option value="Luxemburgo">Luxemburgo</option>
                                                            <option value="Macau">Macau</option>
                                                            <option value="Macedônia">Macedônia</option>
                                                            <option value="Madagascar">Madagascar</option>
                                                            <option value="Malásia">Malásia</option>
                                                            <option value="Malaui">Malaui</option>
                                                            <option value="Mali">Mali</option>
                                                            <option value="Malta">Malta</option>
                                                            <option value="Marrocos">Marrocos</option>
                                                            <option value="Martinica">Martinica</option>
                                                            <option value="Mauritânia">Mauritânia</option>
                                                            <option value="Mauritius">Mauritius</option>
                                                            <option value="México">México</option>
                                                            <option value="Moldova">Moldova</option>
                                                            <option value="Mônaco">Mônaco</option>
                                                            <option value="Montserrat">Montserrat</option>
                                                            <option value="Nepal">Nepal</option>
                                                            <option value="Nicarágua">Nicarágua</option>
                                                            <option value="Niger">Niger</option>
                                                            <option value="Nigéria">Nigéria</option>
                                                            <option value="Noruega">Noruega</option>
                                                            <option value="Nova Caledônia">Nova Caledônia</option>
                                                            <option value="Nova Zelândia">Nova Zelândia</option>
                                                            <option value="Omã">Omã</option>
                                                            <option value="Palau">Palau</option>
                                                            <option value="Panamá">Panamá</option>
                                                            <option value="Papua-nova Guiné">Papua-nova Guiné</option>
                                                            <option value="Paquistão">Paquistão</option>
                                                            <option value="Peru">Peru</option>
                                                            <option value="Polinésia Francesa">Polinésia Francesa</option>
                                                            <option value="Polônia">Polônia</option>
                                                            <option value="Porto Rico">Porto Rico</option>
                                                            <option value="Portugal">Portugal</option>
                                                            <option value="Qatar">Qatar</option>
                                                            <option value="Quênia">Quênia</option>
                                                            <option value="Rep. Dominicana">Rep. Dominicana</option>
                                                            <option value="Rep. Tcheca">Rep. Tcheca</option>
                                                            <option value="Reunion">Reunion</option>
                                                            <option value="Romênia">Romênia</option>
                                                            <option value="Ruanda">Ruanda</option>
                                                            <option value="Rússia">Rússia</option>
                                                            <option value="Saipan">Saipan</option>
                                                            <option value="Samoa Americana">Samoa Americana</option>
                                                            <option value="Senegal">Senegal</option>
                                                            <option value="Serra Leone">Serra Leone</option>
                                                            <option value="Seychelles">Seychelles</option>
                                                            <option value="Singapura">Singapura</option>
                                                            <option value="Síria">Síria</option>
                                                            <option value="Sri Lanka">Sri Lanka</option>
                                                            <option value="St. Kitts & Nevis">St. Kitts & Nevis</option>
                                                            <option value="St. Lúcia">St. Lúcia</option>
                                                            <option value="St. Vincent">St. Vincent</option>
                                                            <option value="Sudão">Sudão</option>
                                                            <option value="Suécia">Suécia</option>
                                                            <option value="Suiça">Suiça</option>
                                                            <option value="Suriname">Suriname</option>
                                                            <option value="Tailândia">Tailândia</option>
                                                            <option value="Taiwan">Taiwan</option>
                                                            <option value="Tanzânia">Tanzânia</option>
                                                            <option value="Togo">Togo</option>
                                                            <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                                                            <option value="Tunísia">Tunísia</option>
                                                            <option value="Turquia">Turquia</option>
                                                            <option value="Ucrânia">Ucrânia</option>
                                                            <option value="Uganda">Uganda</option>
                                                            <option value="Uruguai">Uruguai</option>
                                                            <option value="Venezuela">Venezuela</option>
                                                            <option value="Vietnã">Vietnã</option>
                                                            <option value="Zaire">Zaire</option>
                                                            <option value="Zâmbia">Zâmbia</option>
                                                            <option value="Zimbábue">Zimbábue</option>
                                                    </select>
                                                    @if ($errors->has('country'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('country') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>

                                                <div class="col-md-6">
                                                    <input placeholder="Localização(opicional)" id="birthday" type="date" class="form-control{{ $errors->has('birthday') ? ' is-invalid' : '' }}" name="birthday">
                    
                                                    @if ($errors->has('birthday'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('birthday') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                        
                                            <div class="form-group row mb-0">
                                                <div class="col-md-10 offset-md-1">
                                                    <button type="submit" class="btn btn-block  button-yellow">
                                                        Criar Conta
                                                    </button>
                                                </div>
                                            </div>
                                    </form>

                                    <div class="row mt-1 p-1">
                                        <div class="col-md-1"></div>
                                        
                                        <div class="col-md-10 text-center p-2" style="border-top: 1px solid rgba(0,0,0,.5);">
                                            Já possui um conta? <a href="{{route('login')}}">Entre</a>
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
