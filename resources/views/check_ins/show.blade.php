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
                        <div class="col-md-1">
                            <img class="img-fluid rounded-circle" src="{{asset('/img/default_avatar.jpg')}}">
                        </div>

                        <div class="col-md-10" style="font-size:20px;">
                            <div class="col-md-12" ><a class="untappd-link" href="{{route('users.show',$checkIn->user->id)}}">{{$checkIn->user->first_name}}</a> está tomando 
                                uma <a class="untappd-link" href="{{route('beers.show',$checkIn->beer->id)}}">{{$checkIn->beer->name}}</a> por <a class="untappd-link" href="{{route('breweries.show',$checkIn->brewery->id)}}">{{$checkIn->brewery->name}} </a></div>
                            <div class="col-md-12">
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
                                    <div class="card-body">
                                    {{-- Comentarios vao ficar aqui =P --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                
            </div>
        </div>
    </div>
</div>
@endsection
