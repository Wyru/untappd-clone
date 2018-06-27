@extends('layouts.app')
@section('css')
    
    <style>
    
        .small-grey{
            color:gray;
            font-size: 12px;
        }

        .side-user-name{
            color:#565656;
            font-size: 20px;
            font-weight: bolder;
        }
        .side-user-info-grey{
            width: 100%;
            background-color: #f8f8f8;
            color: #333;
            text-align: center;
            text-transform: uppercase;
            font-size: 10px;
            padding: 5px;
            font-weight: bolder;
        }
        .side-user-status-link{
            width: 50%;
        }
        .side-user-status-link:hover{
            text-decoration: none;

        }
        .side-user-status-link:hover > .side-user-info-grey{
            transition: .1s;
            background-color: #eee;
        }
        .side-user-info-grey > .num{
            font-size: 25px;
        }
    </style>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Configurações da Conta</div>

                <div class="card-body">
                    <div class="row">
                        <div class="offset-2 col-md-8 menu-edit-title">
                            Configurações Perfil 
                        </div>
                    </div>
                    

                    <form action="{{route('users.update', Auth::user()->id)}}" method="POST" class="mb-5">
                        @csrf
                        <div class="form-group row align-items-center">
                    
                            <div class="offset-2 col-md-2">
                                <label class="align-middle" >Nome de Usuário</label>
                            </div>
                            

                            <div class="col-md-6">
                                <input value="{{$user->username}}" placeholder="" id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" required>

                                @if ($errors->has('username'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>

                        <div class="form-group row align-items-center">
                    
                            <div class="offset-2 col-md-2">
                                <label class="align-middle" >Email</label>
                            </div>
                            

                            <div class="col-md-6">
                                <input value="{{$user->email}}" placeholder="" id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>


                        <div class="form-group row align-items-center">
                    
                            <div class="offset-2 col-md-2">
                                <label class="align-middle" >Primeiro nome</label>
                            </div>
                            

                            <div class="col-md-6">
                                <input value="{{$user->first_name}}" placeholder="" id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" required>

                                @if ($errors->has('first_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>

                        <div class="form-group row align-items-center">
                    
                            <div class="offset-2 col-md-2">
                                <label class="align-middle" >Sobrenome</label>
                            </div>
                            

                            <div class="col-md-6">
                                <input value="{{$user->last_name}}" placeholder="" id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" required>

                                @if ($errors->has('last_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>

                        <div class="form-group row align-items-center">
                    
                            <div class="offset-2 col-md-2">
                                <label class="align-middle" >Localização</label>
                            </div>
                            

                            <div class="col-md-6">
                                <input value="{{$user->location}}" placeholder="" id="location" type="text" class="form-control{{ $errors->has('location') ? ' is-invalid' : '' }}" name="location" required>

                                @if ($errors->has('location'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('location') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>

                        <div class="form-group row align-items-center">
                    
                            <div class="offset-2 col-md-2">
                                <label class="align-middle" >País</label>
                            </div>
                            

                            <div class="col-md-6">
                                <input value="{{$user->country}}" placeholder="" id="country" type="text" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" name="country" required>

                                @if ($errors->has('country'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>

                        <div class="form-group row align-items-center">
                    
                            <div class="offset-2 col-md-2">
                                <label class="align-middle" >Data de nascimento</label>
                            </div>
                            

                            <div class="col-md-6">
                                <input value="{{$user->birthday}}" placeholder="" id="birthday" type="date" class="form-control{{ $errors->has('birthday') ? ' is-invalid' : '' }}" name="birthday" required>

                                @if ($errors->has('birthday'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('birthday') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>

                        <div class="form-group row align-items-center">
                    
                            <div class="offset-2 col-md-2">
                                <label class="align-middle" >Sexo</label>
                            </div>
                            

                            <div class="col-md-6">
                                <select value="{{$user->gender}}" placeholder="" id="gender" type="text" class="form-control{{ $errors->has('gender') ? ' is-invalid' : '' }}" name="gender" required>
                                    <option value="m">Masculino</option>
                                    <option value="f">Feminino</option>
                                    <option value="n">Não quero dizer</option>
                                </select>
                                @if ($errors->has('gender'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>
                        

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-3">
                                <button type="submit" class="btn btn-block  button-yellow">
                                    Alterar Dados
                                </button>
                            </div>
                        </div>

                    </form>

                    <form action="{{route('users.update.pass', Auth::user('user_id'))}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="offset-2 col-md-8 menu-edit-title">
                                Alterar Senha
                            </div>
                        </div>
                        <div class="form-group row align-items-center">
                    
                            <div class="offset-2 col-md-2">
                                <label class="align-middle" >Senha Atual</label>
                            </div>
                            

                            <div class="col-md-6">
                                <input placeholder="" id="current_password" type="password" class="form-control{{ $errors->has('current_password') ? ' is-invalid' : '' }}" name="current_password" required>

                                @if ($errors->has('current_password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('current_password') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>
                        <div class="form-group row align-items-center">
                    
                            <div class="offset-2 col-md-2">
                                <label class="align-middle" >Senha</label>
                            </div>
                            

                            <div class="col-md-6">
                                <input placeholder="" id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>

                        <div class="form-group row align-items-center">
                    
                            <div class="offset-2 col-md-2">
                                <label class="align-middle" >Confirmar Senha</label>
                            </div>
                            

                            <div class="col-md-6">
                                <input value="" placeholder="" id="password-confirmation" type="password-confirmation" class="form-control{{ $errors->has('password-confirmation') ? ' is-invalid' : '' }}" name="password-confirmation" required>
                            </div>

                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-3">
                                <button type="submit" class="btn btn-block  button-yellow">
                                    Alterar Senha
                                </button>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
