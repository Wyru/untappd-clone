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
                <img class="rounded-circle img-fluid" style="width:100px;" src="{{$user->get_photo()}}">
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
                        <a href="" class="status"><span class="num">{{$user->count_total()}}</span> total</a>
                        <a href="" class="status"><span class="num">{{$user->count_unique()}}</span> únicas</a>
                        <a href="" class="status"><span class="num">{{$user->badges->count()}}</span> insígnias</a>
                        <a href="{{route('users.friends', $user->id)}}" class="status"><span class="num">{{$user->count_friends()}}</span> amigos</a>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Meus check-ins</div>

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
                                <div class="col-md-12 ">
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
                                <div class="card">
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
            <div class="card mb-4">
                <div class="card-header">Amigos</div>

                <div class="card-body">
                    <div class="row">
                        @foreach ($user->friends() as $friend)
                            <div class="col-md-3">
                                <a class="text-center" href="{{route('users.show', $friend->id)}}">
                                    <img class="img-fluid rounded-circle" src="{{$friend->get_photo()}}"><br>
                                    <div class="col-md-12 text-center" style="padding: 0">
                                        {{$friend->first_name}}
                                    </div>
                                </a>

                            </div>
                        @endforeach
                    </div>
                    
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">Cervejas</div>

                <div class="card-body">
                    <div class="row">
                        @foreach ($user->beers() as $beer)
                            <div class="col-md-4">
                                <a href="{{route('beers.show', $beer->id)}}">
                                    <img class="img-fluid" src="{{route('file', $beer->photo)}}"><br>
                                    <div class="col-md-12 text-center" style="padding: 0">
                                            {{$beer->name}}
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">Insignias</div>

                <div class="card-body">
                    <div class="row">
                        @foreach ($user->badges as $has_badge)
                            <div class="col-md-4">
                                <img class="img-fluid rounded-circle" src="{{$has_badge->badge->get_image()}}"><br>
                                {{$has_badge->badge->description}}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
@endsection
