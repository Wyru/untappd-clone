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
                <div class="card-header">Check-in</div>

                <div class="card-body">
                    <div class="row">
                        <div class="offset-2 col-md-8 menu-edit-title">
                            Configurações Perfil 
                        </div>
                    </div>
                    

                    <form action="{{route('check_in.store')}}" method="POST" class="mb-5">
                        @csrf
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        <div class="form-group row align-items-center">
                    
                            <div class="offset-2">
                                <h1><label class="align-middle" >Que cerveja você está tomando?</label></h1>
                            </div>
                            
                        </div>                        
                            <div class="row">
                                <div class="offset-2 col-md-2">
                                    <select name="beer_id">
                                        @foreach ($beers as $beer)
                                            <option value="{{$beer->id}}">{{$beer->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    NOTA:
                                    <select name="grade">
                                        @for ($i = 0; $i <= 5; $i++)
                                           <option value="{{$i}}">{{$i}}</option>
                                        @endfor
                                    </select>
                                </div>                                    
                                <div class="col-md-2">
                                    <a href="#">Cadastrar nova cerveja</a>
                                </div>
                            </div>
                            <br>    
                            <p class=" text-center">
                                <button class="btn btn-secondary" type="submit">Fazer Check-in</button>
                            </p>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
