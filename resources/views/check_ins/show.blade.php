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

                        <div class=" col-md-8">
                            <div class="side-user-name">
                            <img style="width:100px; height:100px;" src="{{$brewery->logo}}" alt="Logo da cervejaria">
                            <a href="{{route('users.show', $user->id)}}">{{$user->first_name}}</a>
                            tomou <a href="#">{{$beer->name}}</a> em <a href="#"> {{$brewery->name}}</a>
                            <?php $stars = 0 ?>
                            <br>Nota:
                            @while ($stars < $check->grade)
                                <span class="fa fa-star" style="color: orange;" ></span>
                                <?php $stars++ ?>
                            @endwhile                              

                            @while ($stars < 5)
                                <span class="fa fa-star"></span> 
                                <?php $stars++ ?>
                            @endwhile                              
                        </div>
                        <div class="offset-2 col-md-8">
                        
                            <img class="h-50" src="{{$beer->photo}}" alt="Foto da cerveja">
                        </div>
                    </div>                    

                <div class="col-md-4">
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
@endsection
