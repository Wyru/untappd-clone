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
                <div class="card-header">Atividades Recentes</div>

                <div class="card-body">
                    @foreach ($checkIns as $checkIn)
                    <div class="check_in">
                        <div class="row">
                            <div class="col-md-1">
                                <img class="img-fluid rounded-circle" src="{{$checkIn->user->get_photo()}}">
                            </div>

                            <div class="col-md-10" style="font-size:20px;">
                                <div class="col-md-12" ><a class="untappd-link" href="{{route('users.show',$checkIn->user->id)}}">{{$checkIn->user->first_name}}</a> está tomando 
                                    uma <a class="untappd-link" href="{{route('beers.show',$checkIn->beer->id)}}">{{$checkIn->beer->name}}</a> por <a class="untappd-link" href="{{route('breweries.show',$checkIn->brewery->id)}}">{{$checkIn->brewery->name}} </a></div>
                                    <div class="row mb-3">
                                            <div class="col-md-4 ">
                                                    <?php $stars = 0 ?>
                                                    @while ($stars < $checkIn->grade)
                                                        <span class="fa fa-star" style="color: orange;" ></span>
                                                        <?php $stars++ ?>
                                                    @endwhile                              
                        
                                                    @while ($stars < 5)
                                                        <span class="fa fa-star"></span> 
                                                        <?php $stars++ ?>
                                                    @endwhile  
                                            </div>
                                            <div class="col-md-8 " style="font-size:10px;">
                                                <div class="row justify-content-end">
                                                        @foreach ($checkIn->badges as $has_badge)
                                                        <div class="col-md-2">
                                                            <img class="img-fluid rounded-circle" src="{{$has_badge->badge->get_image()}}"><br>
                                                            
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                @if($checkIn->photo)
                                    <div class="col-md-12 mt-3 mb-3">
                                        <div class="row jutify-content-center">
                                            <div class="col"></div>
                                            <img style="height:400px;" class="" src="{{route('file',$checkIn->photo)}}">
                                            <div class="col"></div>
                                        </div>
                                    </div>
                                @endif
                                
                            </div>

                            <div class="col-md-1">
                                <img class="img-fluid " src="{{route('file',$checkIn->beer->photo)}}">
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-md-10">
                                    <div class="card-header">Comentarios</div>
                                        <div class="card">
                                            <div class="card-body">
                                                @foreach ($checkIn->comments()->get() as $comment)
                                                        <?php $user_now = $comment->getUser() ?>
                                                            <a href="{{route('users.show',$user_now->id)}}"><p>{{$user_now->first_name}} {{$user_now->last_name}}:</a>
                                                            {{$comment->description}}</p>

                                                @endforeach
                                            </div>
                                        </div>
                                    <form method="POST" action="{{route('check_in.comment')}}">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                        <input type="hidden" name="check_in_id" value="{{$checkIn->id}}">
                                        <input type="text" name="description">
                                        <button class="btn btn-secondary" type="submit">Comentar</button>
                                        
                                    </form>
                                    </div>
                        </div>
                        <div class="row justify-content-end mt-2">
                            <div class="col-md-4">
                                    {{\Carbon\Carbon::parse($checkIn->created_at)->format('d/m/Y')}}
                                    as 
                                    {{\Carbon\Carbon::parse($checkIn->created_at)->format('h:i:s')}}
                            </div>
                        </div>
                    </div>
                    
                    @endforeach
                    <div class="row justify-content-end mt-4">
                        <div class="col-md-3">
                                {{ $checkIns->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row px-3 mb-3">
                            <div class="col-md-3 p-0 ">
                                <img class="rounded-circle img-fluid" src="{{Auth::user()->get_photo()}}">
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
                                    <span class="num">{{Auth::user()->count()}}</span><br>
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
