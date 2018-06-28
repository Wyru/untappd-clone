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
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Atividade Recente dos Amigos</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                @foreach ($query as $q)
                        
                    <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">Check-in</div>
                                    <div class="card-body">
                                        <div class="row">

                                            <div class=" col-md-8">
                                                <div class="side-user-name">
                                                <img style="width:100px; height:100px;" src="{{$q->logo}}" alt="Logo da cervejaria">
                                                <a href="{{route('users.show', $q->user_id)}}">{{$q->first_name}}</a>
                                                tomou <a href="#">{{$q->beer_name}}</a> em <a href="#"> {{$q->brewery_name}}</a>
                                                <?php $stars = 0 ?>
                                                <br>Nota:
                                                @while ($stars < $q->grade)
                                                    <span class="fa fa-star" style="color: orange;" ></span>
                                                    <?php $stars++ ?>
                                                @endwhile                              

                                                @while ($stars < 5)
                                                    <span class="fa fa-star"></span> 
                                                    <?php $stars++ ?>
                                                @endwhile                              
                                            </div>
                                            <div class="offset-2 col-md-8">
                                            
                                                <img class="h-50" src="{{$q->photo}}" alt="Foto da cerveja">
                                            </div>
                                        </div>                    
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    @endforeach
                
                </div>
            </div>
        </div>

        <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row px-3 mb-3">
                            <div class="col-md-3 p-0 ">
                                <img class="rounded-circle img-fluid" src="{{asset('/img/default_avatar.jpg')}}">
                            </div>
                            <div class="col-md-9 p-0">
                                <div class="col-md-12 side-user-name">{{Auth::user()->first_name.' '.Auth::user()->last_name}}</div>
                                <div class="col-md-12 small-grey"><i class="fas fa-user"></i> {{Auth::user()->username}}</div>
                                <div class="col-md-12 small-grey"><i class="fas fa-map-marker-alt"></i> {{Auth::user()->location}}</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12" style="display:flex;flex-wrap: wrap;">
                                <a class="side-user-status-link" href="#"><div class="side-user-info-grey" style="border-bottom: 1px solid rgba(0,0,0,.3); border-right: 1px solid rgba(0,0,0,.3)">
                                    <span class="num">{{Auth::user()->count_total()}}</span><br>
                                    Total
                                </div></a>
                                <a class="side-user-status-link" href="#"><div class="side-user-info-grey" style="border-bottom: 1px solid rgba(0,0,0,.3)">
                                    <span class="num">{{Auth::user()->count_unique()}}</span><br>
                                    Únicas
                                </div></a>
                                <br>
                                <a class="side-user-status-link" href="#"><div class="side-user-info-grey" style="border-right: 1px solid rgba(0,0,0,.3)">
                                    <span class="num">0</span><br>
                                    Insignias 
                                </div></a>
                                <a class="side-user-status-link" href="{{route('users.friends', Auth::user()->id)}}"><div class="side-user-info-grey">
                                    <span class="num">{{Auth::user()->count_friends()}}</span><br>
                                    Amigos
                                </div></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection
