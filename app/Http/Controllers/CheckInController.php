<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\CheckIn;
use App\Beer;
use App\User;
use App\Brewery;
use App\HasBadge;
use Carbon\Carbon;

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

        $user = User::find($request->user_id);

        
        $id =  CheckIn::create([
            'user_id' => $request->user_id,
            'beer_id' => $request->beer_id,
            'grade' => $request->grade
            ])->id;
        
        /////////////////////////////////////////////////////////////
        /////////TA COMENTADO PQ TEM Q CRIAR OS BADGES NO BANCO//////
        /////////////////////////////////////////////////////////////

        // $count_beers = CheckIn::where('beer_id', '=', $request->beer_id)->where('user_id', '=', $request->user_id)->count();
        
        // if($count_beers == 1){
        //     HasBadge::Create(
        //         ['user_id' => $user->id],
        //         ['badge_id' => 7],
        //         ['check_in_id' => $id]
        // );
        // }
        // if($count_beers == 3){
        //     HasBadge::Create(
        //         ['user_id' => $user->id],
        //         ['badge_id' => 9],
        //         ['check_in_id' => $id]
        // );
        // }
        
        // if($user->count_total() == 1){
        //     HasBadge::Create(
        //         ['user_id' => $user->id],
        //         ['badge_id' => 1],
        //         ['check_in_id' => $id]
        // );
        // }
        // elseif($user->count_total() == 25 ){
        //     HasBadge::Create(
        //         ['user_id' => $user->id],
        //         ['badge_id' => 4],
        //         ['check_in_id' => $id]
        // );
        // }
        // elseif($user->count_total() == 50 ){
        //     HasBadge::Create(
        //         ['user_id' => $user->id],
        //         ['badge_id' => 5],
        //         ['check_in_id' => $id]
        // );
        // }
        // elseif($user->count_total() == 100 ){
        //     HasBadge::Create(
        //         ['user_id' => $user->id],
        //         ['badge_id' => 6],
        //         ['check_in_id' => $id]
        // );
        // }
        

        return redirect(route('check_in.show', $id));

    }
    
    public function show($id)
    {
        
        $check = CheckIn::find($id);

        $user  = User::find($check->user_id);

        $beer = Beer::find($check->beer_id);

        $brewery = Brewery::find($beer->brewery_id);


        return view('/check_ins/show', compact(['check'], ['user'], ['beer'], ['brewery']));

    }

    public function showAllHome($id){

        
        $query = DB::table('check_ins')
                ->join('users', 'users.id', '=', 'check_ins.user_id')
                ->join('beers', 'beers.id', '=', 'check_ins.beer_id')
                ->join('brewery', 'brewery.id', '=', 'beers.brewery_id')
                ->join('has_friend', 'user_sender', '=', 'users.id')
                ->where('status', '=', true)
                ->select('*','users.id as user_id', 'brewery.name as brewery_name','beers.name as beer_name')
                ->get();

               // dd($query);
                
                return view('feed', compact(['query']));

    }

    public function showAllProfile($user_id){

        
        $check = DB::table('check_ins')
                ->join('users', 'users.id', '=', 'check_ins.user_id')
                ->join('beers', 'beers.id', '=', 'check_ins.beer_id')
                ->join('brewery', 'brewery.id', '=', 'beers.brewery_id')
                ->select('*','brewery.name as brewery_name','beers.name as beer_name')
                ->get();

        return view('/');

    }
    

}
