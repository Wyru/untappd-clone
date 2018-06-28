<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

use App\HasFriend;

use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UpdateUserPasswordRequest;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::find($id);


        $user->fill($request->all());
        $user->save();


        return redirect()->route('users.show',$user->id);
    }

    public function updatePassword(UpdateUserPasswordRequest $request){

        if(isset($request->password)){
            if(Hash::check($request->current_password, $user->password)){
                $user->password = bcrypt($request->password);
            }
        }
        
        return redirect()->route('users.show',$user->id);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function search(Request $request){
        
        $input = $request->all();

        // dd($input['query']);

        $users = [];
        
        if(isset($input['query'])){
            $users = User::where('first_name', 'ilike', '%'.$input['query'].'%')->orWhere('last_name', 'ilike', '%'.$input['query'].'%')->get();
        }
        
        // dd($users);
        //$users = User::all();
    
    return view('users.search_friends', compact(['users']));
    }


    public function friend_request(Request $request){
        
        HasFriend::create($request->all());
        return redirect()->back();
    }

    public function accept_friend_request(Request $request){

        $hasfriend = HasFriend::find($request->has_friend_id);


        $hasfriend->status = true;
        $hasfriend->save();

        return redirect()->back();
    }

    public function list_friends($id){


        $friends = HasFriend::where('user_sender', '=', $id)->orWhere('user_receiver', '=', $id)->get();

        // dd($friends);

        $user_ids = array();
        $request_ids = array();
        $ids = array();

        foreach ($friends as $friend) {
            //dd($friend->id);
            if($friend->status){
                if($friend->user_sender == $id){
                    array_push($user_ids, $friend->user_receiver);
                }
                else{
                    array_push($user_ids, $friend->user_sender);
                }
            }
            else{
                if($friend->user_sender != $id){
                    array_push($request_ids, $friend->user_sender);
                    array_push($ids, $friend->id);
                }
            }
        }
        
        $users = array();
        $requests = array();
        
        foreach ($user_ids as $user) {
            array_push($users, User::where('id', '=', $user)->first());;
        }
        
        foreach ($request_ids as $user) {
            array_push($requests, User::where('id', '=', $user)->first());;
        }
        
        return view('/users/show_friends', compact(['users'], ['requests'], ['ids']));
    }

    public function decline_friend_request(Request $request){

        $hasfriend = HasFriend::find($request->has_friend_id);
        $hasfriend->delete();
        
        return redirect()->back();
    }

}
