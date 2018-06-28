<?php

namespace App\Http\Controllers;

use App\CheckIn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $friends_ids = Auth::user()->friends()->pluck('id');

        $checkIns = CheckIn::whereIn('user_id', array_merge($friends_ids->toArray(),[Auth::user()->id]))
                                ->orderBy('created_at', 'DESC')
                                ->paginate(15);

        return view('home', compact('checkIns'));
    }
}
