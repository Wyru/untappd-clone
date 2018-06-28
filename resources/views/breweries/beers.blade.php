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
                                <div class="col-6  col-4 styled-border-bottom p-2" >TOTAL <BR>57 </div>
                                <div class="col-6 styled-border-left col-4 styled-border-bottom p-2" >UNICAS <BR>4,9885 </div>
                                <div class="col-6  col-4 p-2" >MENSAL <BR>4,9885 </div>
                                <div class="col-6 styled-border-left col-4 p-2" >VOCÊ <BR>4,9885</div>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-around">
                        <div class="col-md-4 text-center styled-border-bottom p-2" >Nota: 5 </div>
                        <div class="col-md-4 text-center styled-border-left styled-border-bottom p-2" >57 avaliações</div>
                        <div class="col-md-4 text-center styled-border-left styled-border-bottom p-2" >57 cervejas </div>
                    </div>
                </div>
                
            </div>
        </div>   
    </div>
        
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="offset-1 col-md-10 menu-edit-title">
                            Cervejas
                        </div>
                    </div>
                    @foreach ($brewery->beers as $beer)
                    <div class="row brewery styled-border-bottom p-3">
                        <div class="col-md-2">
                            <img class="img-img-fluid" src="{{route('file', $beer->photo)}}">
                        </div>
                        <div class="col-md-6">
                            <div style="font-size:20px; font-weight: bolder;"><a href="{{route('beers.show',$beer->id)}}">{{$beer->name}}</a></div>
                            <div>{{$beer->country}}</div>
                        </div>
                        
                    </div>
                    <div class="row d-flex justify-content-around mb-4">
                        <div class="col text-center styled-border-bottom p-2" >{{$beer->alcoholic_content}}% teor alcoólico </div>
                        <div class="col text-center styled-border-left styled-border-bottom p-2" >57</div>
                        <div class="col text-center styled-border-left styled-border-bottom p-2" >4646 avaliações </div>
                        <div class="col text-center styled-border-left styled-border-bottom p-2" >adicionada {{\Carbon\Carbon::parse($beer->created_at)->format('d/m/Y')}} </div>

                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection
