@extends('layouts.app')
@section('css')
    <style>
    
        .styled-border-left{
            border-left:1px solid rgba(0,0,0,.5);
        }
        .styled-border-bottom{
            border-bottom:1px solid rgba(0,0,0,.5);
        }

        
    </style>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mb-3">
            <div class="card">
                <div class="card-body">
                    
                    <div class="row brewery styled-border-bottom p-3">
                        <div class="col-md-2">
                            <img src="{{route('file', $beer->photo)}}">
                        </div>
                        <div class="col-md-8">
                            <div style="font-size:30px; font-weight: bolder;">{{$beer->name}}</div>
                            <div><a style="font-size:20px;" href="{{route('breweries.show', $beer->brewery_id)}}">{{$beer->brewery->name}}</a></div>
                            <div>{{$beer->type}}</div>

                        </div>
                        <div class="col-md-2">
                            <div class="row justify-content-start">
                                <div class="col-6  col-4 styled-border-bottom p-2" >TOTAL <BR>{{$beer->checkIns->count()}} </div>
                                <div class="col-6 styled-border-left col-4 styled-border-bottom p-2" >UNICAS <BR>{{$beer->uniqueCheckInsNum()}} </div>
                                <div class="col-6  col-4 p-2" >MENSAL <BR> - </div>
                                <div class="col-6 styled-border-left col-4 p-2" >VOCÊ <BR>{{$beer->userCheckIns(Auth::user()->id)->get()->count()}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-around mb-4">
                        <div class="col text-center styled-border-bottom p-2" >{{$beer->alcoholic_content}}% teor alcoólico </div>
                        <div class="col text-center styled-border-left styled-border-bottom p-2">
                        <?php $stars = 0 ?>
                            @while ($stars < intVal($beer->get_grade()))
                                <span class="fa fa-star" style="color: orange;" ></span>
                                <?php $stars++ ?>
                            @endwhile                              

                            @while ($stars < 5)
                                <span class="fa fa-star"></span> 
                                <?php $stars++ ?>
                            @endwhile  
                        {{$beer->get_grade()}} 
                    </div>
                        <div class="col text-center styled-border-left styled-border-bottom p-2" >adicionada {{\Carbon\Carbon::parse($beer->created_at)->format('d/m/Y')}} </div>
                    </div>
                </div>
                
            </div>
        </div>   
    </div>

    <div class="row justify-content-center">

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Check-Ins</div>

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
                                <div class="card">
                                    <div class="card-header">Comentarios</div>
                                    <div class="card-body">
                                    {{-- Comentarios vao ficar aqui =P --}}
                                    </div>
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
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="offset-1 col-md-10 menu-edit-title">
                            Quem tomou
                        </div>
                    </div>
                    <div class="row justify-content-around">
                        aa
                    </div>
                    <div class="row justify-content-end">
                    <div class="col-md-4"><a href="{{route('breweries.beers', $beer->id)}}">ver todos...</a></div>
                    </div>
                </div>
                
            </div>
        </div>  
    </div>
</div>
@endsection
