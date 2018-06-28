<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\CheckIn;
use App\Beer;

class CheckInController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
          
        $beers = Beer::All();

 
        return view('/check_ins/create', compact(['beers']));

    }
    
    public function store(Request $request)
    {
          CheckIn::create([
            'user_id' => $request->user_id,
            'beer_id' => $request->beer_id,
            'grade' => $request->grade
        ]);
        
        return redirect('home');

    }


}
