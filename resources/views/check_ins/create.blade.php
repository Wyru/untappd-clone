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
                <div class="card-header">Fazer Check-in</div>
                <div class="card-body">
                    <form action="{{route('check_in.store')}}" enctype="multipart/form-data" method="POST" class="form-group">
                        @csrf
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        <div class="row mb-3 ">
                            <h2 class="text-center col-md-12">Que cerveja você está tomando?</h2>
                        </div>
                        <div class="form-group row justify-content-center">
                    
                            <div class="col-md-3 text-right">
                                <label class="align-middle" >Nome da Cerveja</label>
                            </div>
                            
                            <div class="col-md-7">
                                <select name="beer_id" class="form-control">
                                    @foreach ($beers as $beer)
                                        <option value="{{$beer->id}}">{{$beer->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row justify-content-center">
                    
                            <div class="col-md-3 text-right">
                                <label class="align-middle" >Avaliação</label>
                            </div>
                            
                            <div class="col-md-7">
                                <select name="grade" class="form-control">
                                    @for ($i = 0; $i <= 5; $i++)
                                        <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="form-group row justify-content-center">
                    
                            <div class="col-md-3 text-right">
                                <label class="align-middle" >Foto do momento</label>
                            </div>
                            
                            <div class="col-md-7">
                                <input placeholder="" id="photo" type="file" class="form-control{{ $errors->has('photo') ? ' is-invalid' : '' }}" name="photo">
                            </div>

                        </div>                       
                        <div class="row justify-content-end mb-4">                                   
                            <div class="col-md-6">
                                <a href="{{route('beers.create')}}">Não encontrou a cerveja que procurava?</a>
                            </div>
                        </div>
                        <div class="form-group row justify-content-center">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-block  button-yellow">
                                    Casdastrar Cerveja
                                </button>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
