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
    <div class="row justify-content-end mb-3">
            <a href="{{route('breweries.create')}}" class="btn btn-primary pull-right">Cadastrar cervejaria</a>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @foreach ($breweries as $brewery)
                    <div class="row brewery styled-border-bottom p-3">
                        <div class="col-md-2">
                            <img class="img-img-fluid" src="{{route('file', $brewery->logo)}}">
                        </div>
                        <div class="col-md-6">
                            <div style="font-size:20px; font-weight: bolder;"><a href="{{route('breweries.show',$brewery->id)}}">{{$brewery->name}}</a></div>
                            <div>{{$brewery->country}}</div>
                        </div>
                        <div class="col-md-4">
                            
                            <div class="row justify-content-start">
                                <div class="col-5 styled-border-left col-4 styled-border-bottom p-2" >57 cervejas</div>
                                <div class="col-7 styled-border-left col-4 styled-border-bottom p-2" >4,9885 avaliações</div>
                            </div>
                            <div class="row styled-border-left">  
                                <div class="col-4">
                                        4.7
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection
