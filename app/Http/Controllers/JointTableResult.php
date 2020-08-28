<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Player_Event;
class JointTableResult extends Controller
{
    //
    public function index(){
        
        $data=DB::table('nets')
                ->join('events','events.EventID','=','nets.EventID')
                ->join('unis','events.UniID','=','unis.UniID')
                ->select('events.Date','events.Round','events.Gender','unis.UniName','nets.Result')
                ->get();
        return view('NetBallResultTable',compact('data'));

    }
    public function index1(){

        $data=DB::table('vollies')
                ->join('events','events.EventID','=','vollies.EventID')
                ->join('unis','events.UniID','=','unis.UniID')
                ->select('events.Date','events.Round','events.Gender','unis.UniName','vollies.Result')
                ->get();
        return view('VollyBallResultTable',compact('data'));

    }

   
    public function Schedule(){
            $sport1=DB::table('sports__teams')->select('Sport')->distinct()->get();
            $data=DB::table('player__events')
                    ->join('unis as a','a.UniID','=','player__events.Uni1')
                    ->join('unis as b','b.UniID1','=','player__events.Uni2')
                    ->select('a.UniName','a.Image','a.UniID','b.UniName1','b.Image1','b.UniID1','player__events.*')
                    ->orderBy('player__events.Date','desc')
                    ->orderBy('player__events.MatchNo','desc')
                    ->get();
                  if(count($data)>0){  
            return view('schedule.EventSchedule',compact('data','sport1'))->with('sport1',$sport1);
                  }
                  return view('schedule.EventSchedule')->with('message','No Data Founds')->with('sport1',$sport1);     
                  
            }

            public function SearchSchedule(Request $request){
                $p=$request->Sport;
                $q=$request->date;
                $r=$request->Gender;
               $sport1=DB::table('sports__teams')->select('Sport')->distinct()->get();

                if(($p != '') && ($q != '')&&($r != '')){
                    $data=DB::table('player__events')
                    ->join('unis as a','a.UniID','=','player__events.Uni1')
                    ->join('unis as b','b.UniID1','=','player__events.Uni2')
                    ->select('a.UniName','a.Image','a.UniID','b.UniName1','b.Image1','b.UniID1','player__events.*')
                     ->where('player__events.Sport',$p)
                     ->where('player__events.Date',$q)
                     ->where('player__events.Gender',$r)
                    ->orderBy('player__events.Date','asc')
                    ->orderBy('player__events.MatchNo','desc')
                    ->get();
                        if(count($data)>0){
                            return view('schedule.EventSchedule',compact('data'))->with('sport1',$sport1);
                        }
                }
                elseif($p != '' && $q != '' && $r=='') {
                        $data=DB::table('player__events')
                        ->join('unis as a','a.UniID','=','player__events.Uni1')
                        ->join('unis as b','b.UniID1','=','player__events.Uni2')
                        ->select('a.UniName','a.Image','a.UniID','b.UniName1','b.Image1','b.UniID1','player__events.*')
                         ->where('player__events.Sport',$p)
                         ->where('player__events.Date',$q)
                        ->orderBy('player__events.Date','asc')
                        ->orderBy('player__events.MatchNo','desc')
                        ->get();
                            if(count($data)>0){
                                return view('schedule.EventSchedule',compact('data'))->with('sport1',$sport1);
                            }
                }
                elseif($p != '' && $q == '' && $r!='') {
                        $data=DB::table('player__events')
                        ->join('unis as a','a.UniID','=','player__events.Uni1')
                        ->join('unis as b','b.UniID1','=','player__events.Uni2')
                    // ->where('player__events.Sport','BAdminton')
                        ->select('a.UniName','a.Image','a.UniID','b.UniName1','b.Image1','b.UniID1','player__events.*')
                         ->where('player__events.Sport',$p)
                        // ->where('player__events.Date',$q)
                         ->where('player__events.Gender',$r)
                        //->select('unis.*','player__events.*')
                        //->orderBy('player__events.WeightCategory','asc')
                        ->orderBy('player__events.Date','asc')
                        ->orderBy('player__events.MatchNo','desc')                       
                        ->get();
                            if(count($data)>0){
                                return view('schedule.EventSchedule',compact('data'))->with('sport1',$sport1);
                            }
                }
                elseif($p == '' && $q != '' && $r!='') {
                        $data=DB::table('player__events')
                        ->join('unis as a','a.UniID','=','player__events.Uni1')
                        ->join('unis as b','b.UniID1','=','player__events.Uni2')
                    // ->where('player__events.Sport','BAdminton')
                        ->select('a.UniName','a.Image','a.UniID','b.UniName1','b.Image1','b.UniID1','player__events.*')
                         //->where('player__events.Sport',$p)
                         ->where('player__events.Date',$q)
                         ->where('player__events.Gender',$r)
                        //->select('unis.*','player__events.*')
                        //->orderBy('player__events.WeightCategory','asc')
                        ->orderBy('player__events.Date','asc')
                        ->orderBy('player__events.MatchNo','desc')
                        ->get();
                            if(count($data)>0){
                                return view('schedule.EventSchedule',compact('data'))->with('sport1',$sport1);
                            }
                }
                elseif($p == '' && $q == '' && $r!='') {
                        $data=DB::table('player__events')
                        ->join('unis as a','a.UniID','=','player__events.Uni1')
                        ->join('unis as b','b.UniID1','=','player__events.Uni2')
                    // ->where('player__events.Sport','BAdminton')
                        ->select('a.UniName','a.Image','a.UniID','b.UniName1','b.Image1','b.UniID1','player__events.*')
                         //->where('player__events.Sport',$p)
                         //->where('player__events.Date',$q)
                         ->where('player__events.Gender',$r)
                        //->select('unis.*','player__events.*')
                        //->orderBy('player__events.WeightCategory','asc')
                        ->orderBy('player__events.Date','asc')
                        ->orderBy('player__events.MatchNo','desc')  
                        ->get();
                            if(count($data)>0){
                                return view('schedule.EventSchedule',compact('data'))->with('sport1',$sport1);
                            }
                }
                elseif($p == '' && $q != '' && $r=='') {
                        $data=DB::table('player__events')
                        ->join('unis as a','a.UniID','=','player__events.Uni1')
                        ->join('unis as b','b.UniID1','=','player__events.Uni2')
                    // ->where('player__events.Sport','BAdminton')
                        ->select('a.UniName','a.Image','a.UniID','b.UniName1','b.Image1','b.UniID1','player__events.*')
                         //->where('player__events.Sport',$p)
                         ->where('player__events.Date',$q)
                         //->where('player__events.Gender',$r)
                        //->select('unis.*','player__events.*')
                        //->orderBy('player__events.WeightCategory','asc')
                        ->orderBy('player__events.Date','asc')
                        ->orderBy('player__events.MatchNo','desc')
                        ->get();
                            if(count($data)>0){
                                return view('schedule.EventSchedule',compact('data'))->with('sport1',$sport1);
                            }
                }
                elseif($p != '' && $q == '' && $r=='') {
                        $data=DB::table('player__events')
                        ->join('unis as a','a.UniID','=','player__events.Uni1')
                        ->join('unis as b','b.UniID1','=','player__events.Uni2')
                    // ->where('player__events.Sport','BAdminton')
                        ->select('a.UniName','a.Image','a.UniID','b.UniName1','b.Image1','b.UniID1','player__events.*')
                         ->where('player__events.Sport',$p)
                         //->where('player__events.Date',$q)
                         //->where('player__events.Gender',$r)
                        //->select('unis.*','player__events.*')
                        //->orderBy('player__events.WeightCategory','asc')
                        ->orderBy('player__events.Date','asc')
                        ->orderBy('player__events.MatchNo','desc')
                        ->get();
                            if(count($data)>0){
                                return view('schedule.EventSchedule',compact('data'))->with('sport1',$sport1);
                            }
                }     
                return view('schedule.EventSchedule')->with('message','No Data Founds')->with('sport1',$sport1);       
            }
    // public function index2(){
    //     $data=Player_Event::all();
    //     return view('home.EventSchedule',compact('data'));

    // }

    public function index3(){
        $data=DB::table('elle')
                ->join('player__events','event_unis.EventID','=','player__events.EventID')
                ->select('player__events.Date','player__events.Round','player__events.Sport','event_unis.Uni1','event_unis.Uni2','player__events.Time','player__events.Venue','player__events.Gender')
                ->get();
        return view('home.EventSchedule',compact('data'));

    }

    public function Schedule1(){
        $d=DB::table('schedule')->get()->toArray();
        return view('home.Schedule',compact('d'));
        }


}
