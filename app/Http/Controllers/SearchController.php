<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Beer;
use App\Brewery;

class SearchController extends Controller
{
    public function search(Request $request){
        $text = "";
        if(isset($request->text)){
            $text = strtolower($request->text);
            $beers = Beer::whereRaw('LOWER(name) like "%'.$text.'%"')->get();
            $breweries = Brewery::whereRaw('LOWER(name) like "%'.$text.'%"')->get();
        }
        else{
            $beers = Beer::all();
            $breweries = Brewery::all();
        }

        return view('search.results', compact('beers', 'breweries', "text"));
    }
}
