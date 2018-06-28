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
use App\Comment;

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
    
    public function create_comment(Request $request){
        $check = Comment::create([
            'user_id' => $request->user_id,
            'check_in_id' => $request->check_in_id,
            'description' => $request->description
        ]);

            //dd($check);

        return redirect()->back();

    }

    
    public function store(Request $request)
    {

        $user = User::find($request->user_id);

        
        $check_in =  CheckIn::create([
            'user_id' => $request->user_id,
            'beer_id' => $request->beer_id,
            'grade' => $request->grade
        ]);
        
        if($request->file('photo')){
            $file_path = 'checkin/photo'; 
            $check_in->photo = $check_in->uploadFile($request->file('photo'), $file_path); 
            $check_in->save();
        }


        $count_beers = CheckIn::where('beer_id', '=', $request->beer_id)->where('user_id', '=', $request->user_id)->count();
        
        //ufa hoje é sexta
        if(Carbon::parse($check_in->created_at)->isFriday()){
            HasBadge::Create(
                ['user_id' => $user->id,
                'badge_id' => 3,
                'check_in_id' => $check_in->id]
            );
        }
        
        //happy our
        if(Carbon::parse($check_in->created_at)->gte(Carbon::now()->hour(18)->minute(0)->second(0)) && Carbon::parse($check_in->created_at)->lte(Carbon::now()->hour(22)->minute(0)->second(0))){
            HasBadge::Create(
                ['user_id' => $user->id,
                'badge_id' => 2,
                'check_in_id' => $check_in->id]
            );
        }

        if($count_beers == 1){
            HasBadge::Create(
                ['user_id' => $user->id,
                'badge_id' => 7,
                'check_in_id' => $check_in->id]
            );
        }

        if($count_beers == 3){
            HasBadge::Create(
                ['user_id' => $user->id,
                'badge_id' => 9,
                'check_in_id' => $check_in->id]
            );
        }
        
        if($user->count_total() == 1){
            HasBadge::Create(
                ['user_id' => $user->id,
                'badge_id' => 1,
                'check_in_id' => $check_in->id]
            );
        }
        elseif($user->count_total() == 25 ){
            HasBadge::Create(
                ['user_id' => $user->id,
                'badge_id' => 4,
                'check_in_id' => $check_in->id]
            );
        }
        elseif($user->count_total() == 50 ){
            HasBadge::Create(
                ['user_id' => $user->id,
                'badge_id' => 5,
                'check_in_id' => $check_in->id]
            );
        }
        elseif($user->count_total() == 100 ){
            HasBadge::Create(
                ['user_id' => $user->id,
                'badge_id' => 6,
                'check_in_id' => $check_in->id]
            );
        }

        return redirect(route('home'));

    }
    
    public function show($id)
    {
        $checkIn = CheckIn::find($id);
        return view('check_ins.show', compact('checkIn'));
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
