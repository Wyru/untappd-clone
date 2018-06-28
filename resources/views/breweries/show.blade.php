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
                            <img src="{{route('file', $brewery->logo)}}">
                        </div>
                        <div class="col-md-8">
                            <div style="font-size:30px; font-weight: bolder;">{{$brewery->name}}</div>
                            <div>{{$brewery->location}}, {{$brewery->country}}</div>
                            <div>{{$brewery->type}}</div>

                        </div>
                        <div class="col-md-2">
                            
                            <div class="row justify-content-start">
                                <div class="col-6  col-4 styled-border-bottom p-2" >TOTAL <BR>{{$brewery->checkIns()->count()}}</div>
                                <div class="col-6 styled-border-left col-4 styled-border-bottom p-2" >UNICAS <BR>{{$brewery->UniqueCheckInsNum()}} </div>
                                <div class="col-6  col-4 p-2" >MENSAL <BR>-</div>
                                <div class="col-6 styled-border-left col-4 p-2" >VOCÊ <BR>{{$brewery->userCheckIns(Auth::user()->id)->count()}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-around">
                        <div class="col-md-4 text-center styled-border-bottom p-2" >
                                <?php $stars = 0 ?>
                                @while ($stars < intVal($brewery->get_grade()))
                                    <span class="fa fa-star" style="color: orange;" ></span>
                                    <?php $stars++ ?>
                                @endwhile                              
    
                                @while ($stars < 5)
                                    <span class="fa fa-star"></span> 
                                    <?php $stars++ ?>
                                @endwhile  
                            {{$brewery->get_grade()}} </div>
                        <div class="col-md-4 text-center styled-border-left styled-border-bottom p-2" >{{$brewery->checkIns()->count()}} avaliações</div>
                        <div class="col-md-4 text-center styled-border-left styled-border-bottom p-2" >{{$brewery->beers->count()}} cervejas </div>
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
                                <img class="img-fluid rounded-circle" src="{{Auth::user()->get_photo()}}">
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
                            Cervejas
                        </div>
                    </div>
                    <div class="row justify-content-around">
                        @foreach ($brewery->beers()->limit(6)->get() as $beer)
                            <div class="col-md-4">
                                <img class="img-fluid" src="{{route('file', $beer->photo)}}">
                            </div>
                        @endforeach
                    </div>
                    <div class="row justify-content-end">
                    <div class="col-md-4"><a href="{{route('breweries.beers', $brewery->id)}}">ver todas...</a></div>
                    </div>
                </div>
                
            </div>
        </div>  
    </div>
</div>
@endsection
