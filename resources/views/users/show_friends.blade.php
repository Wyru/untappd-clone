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
            @if (Auth::user()->id == $id)
                
            <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">Solicitações de amizade</div>
                            <div class="card-body">
                            <?php $cont = 0; ?>
                                @foreach ($requests as $user)
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
                                                <form method="POST" action="{{route('users.accept_friend_request')}}">
                                                    @csrf
                                                        <input type="hidden" name="has_friend_id" value="{{$ids[$cont]}}">
                                                        <div class="col-md-12"><button class="btn btn-secondary" type="submit">Aceitar</button></div>
                                                    </form>
                                                <form method="POST" action="{{route('users.decline_friend_request')}}">
                                                    @csrf
                                                        <input type="hidden" name="has_friend_id" value="{{$ids[$cont]}}">
                                                        <p><div class="col-md-12"><button class="btn btn-secondary" type="submit">Recusar</button></div>
                                                    </form>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                <br>
                            <?php $cont++; ?>
                                
                    @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endif


</div>
@endsection
