@extends('layouts.app')
@section('css')
    
    <style>
        .user-cover{
            background-image: url('{{asset("/img/background.jpg")}}');
            height: 300px;
            background-size: cover;
            background-position: center center;
            margin-left: 0px!important;
        }
        .black-cloak{
            background-color: rgba(0, 0, 0, .5);
            height: 300px;
            margin-left: 0px!important;

        }
        .py-4{
            padding-top: 0px!important;
        }
        .user-info{
            color: white;
        }

        .user-info  .fullname{
            font-weight: bolder;
            font-size: 40px;
        }
        .status{
            color: white;
            margin-right: 10px;
            text-transform: uppercase;
        }
        .status:hover{
            color: #eee;
            text-decoration: none;
        }
        .status .num{
            font-size: 20px;            
        }

    </style>
@endsection
@section('content')
<div class="container">
    <div class="row user-cover mb-3">
        <div  class="row align-items-end black-cloak col-12">
            <div class="col-md-2"  style="padding-bottom:20px;padding-left:10px;">
                <img class="rounded-circle img-fluid" style="width:100px;" src="{{asset('/img/default_avatar.jpg')}}">
            </div>
            <div class="col-md-8 user-info" style="padding-bottom:20px; margin-left: -50px;">
                <div class="row mb-2">
                    <div class="col-md-12 fullname">{{$user->first_name.' '.$user->last_name}}</div>
                    <div class="col-md-12 d-flex" style="margin-top:-10px;">
                            <div class="mr-3">{{$user->username}}</div>
                            <div>{{$user->location}}</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 d-flex">
                        <a href="" class="status"><span class="num">0</span> total</a>
                        <a href="" class="status"><span class="num">0</span> únicas</a>
                        <a href="" class="status"><span class="num">0</span> insígnias</a>
                        <a href="{{route('users.friends', $user->id)}}" class="status"><span class="num">{{$user->count_friends()}}</span> amigos</a>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Atividade Recente dos Amigos</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Alguma coisa</div>

                <div class="card-body">
                    aaaa
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
