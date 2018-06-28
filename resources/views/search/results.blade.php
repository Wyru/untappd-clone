@extends('layouts.app')
@section('css')
    
    <style>
    
    </style>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Resultados da pesquisa por "{{$text}}"
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 p-3">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Cervejas</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Cervejarias</a>
                                </li>
                                <li class="nav-item">
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    @foreach ($beers as $beer)
                                        <div class="row brewery styled-border-bottom p-3">
                                            <div class="col-md-2">
                                                <img class="img-img-fluid" src="{{route('file', $beer->photo)}}">
                                            </div>
                                            <div class="col-md-6">
                                                <div style="font-size:20px; font-weight: bolder;"><a href="{{route('beers.show',$beer->id)}}">{{$beer->name}}</a></div>
                                                <div><a href="{{route('breweries.show', $beer->brewery->id )}}">{{$beer->brewery->name}}</a></div>
                                                <div>{{$beer->brewery->country}}</div>
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
                                    @endforeach




                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                                    @foreach ($breweries as $brewery)
                                    <div class="row brewery styled-border-bottom p-3">
                                            <div class="col-md-2">
                                                <img src="{{route('file', $brewery->logo)}}">
                                            </div>
                                            <div class="col-md-8">
                                                <div style="font-size:20px; font-weight: bolder;"><a href="{{route('breweries.show', $brewery->id)}}">{{$brewery->name}}</a></div>
                                                <div>{{$brewery->location}}, {{$brewery->country}}</div>
                                                <div>{{$brewery->type}}</div>
                    
                                            </div>
                                        </div>
                                        <div class="row d-flex justify-content-around mb-3">
                                            <div class="col-md-4 text-center styled-border-bottom " >
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
                                    @endforeach


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
