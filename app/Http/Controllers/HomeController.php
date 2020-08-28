<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use Auth;
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
        $uniid=Auth::user()->UniID;
        $pid=Auth::user()->id;
	$sport=Auth::user()->Sport;
        $gender=Auth::user()->Gender;
	
        $schedule = DB::table('users')
                    ->join('player__events','users.Sport','=','player__events.Sport')    
                    //->where(['users.id'=>$pid])
		    ->Where('player__events.Sport','=',$sport)
                    ->Where('player__events.Gender','=',$gender)
                    ->Where(['player__events.Uni2'=>$uniid])
                    ->orWhere(['player__events.Uni1'=>$uniid])
		    ->select('player__events.*')
                    ->get();

        return view('home',compact('schedule'));    
	
	}
}
