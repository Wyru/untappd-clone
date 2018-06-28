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
            padding: 10px;
            text-transform: uppercase;
            font-size: 10px;
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
            font-size: 20px;
        }
    </style>
@endsection
@section('content')

<div class="container">

    <div class="input-group">
        <form method="GET" action="{{route('users.search')}}">
            <input type="text" class="search" placeholder="Pesquisar usuários" name="query" aria-label="Recipient's username" aria-describedby="basic-addon2">
            <div class="input-group-append search-icon">
                <span class="input-group-text" id="basic-addon2"><i class="fas fa-search"></i></span>
            </div>
        </form>
    </div>
    <br>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pessoas</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
        
        {{-- Show Users --}}
        @foreach ($users as $user)
        @if (Auth::user() != $user)
                    <div class="card">
                        <div class="card-body">
                            <div class="row px-3 mb-3">
                                <div class="col-md-3 p-0 ">
                                    <img class="rounded-circle img-fluid" src="{{asset('/img/default_avatar.jpg')}}">
                                </div>
                                <div class="col-md-9 p-0">
                                    <div class="col-md-12 side-user-name"><a href="{{route('users.show', $user->id)}}">{{$user->first_name.' '.$user->last_name}}</a></div>
                                    <div class="col-md-12 small-grey"><i class="fas fa-user"></i> {{$user->username}}</div>
                                    <div class="col-md-12 small-grey"><i class="fas fa-map-marker-alt"></i> {{$user->location}}</div>
                                <div class="col-md-12 small-grey">

                                    @if (Auth::user()->is_friend($user->id) == 1 )
                                       <h2> Já são amigos </h2>
                                    @elseif (Auth::user()->is_friend($user->id) == 0 )
                                       <h2> Solicitação enviada </h2>
                                    @else
                                        <form method="POST" action="{{route('users.friend_request')}}">
                                        @csrf
                                            <input type="hidden" name="user_sender" value="{{Auth::user()->id}}">
                                            <input type="hidden" name="user_receiver" value="{{$user->id}}">
                                            <p><div class="col-md-12"><button class="btn btn-secondary" type="submit">Adicionar Amigo</button></div></p>
                                        </form>
                                    @endif
                                
                                </div>
                                </div>
                                
                            </div>
                            </div>
                        </div>
                    <br>

            @endif
        @endforeach
                    </div>
                </div>
            </div>
</div>
@endsection
