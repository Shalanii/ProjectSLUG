<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Net;
use App\Sports_Teams;
use App\Player_Event;
use App\Volly;
use App\Uni;
use DB;

class Sports extends Controller
{
    //Store Event Schedule
    public function storeEvents(Request $request){
        $event = new Player_Event;

        $this->validate($request,[
            'matchNo'=>'required|numeric',
            'uniid1'=>'required',
           'uniid2'=>'required',
            //'group'=>'required',
            'round'=>'required',
            'Sport'=>'required',
            'date'=>'required',
            'time'=>'required',
            'venue'=>'required',
            'gender'=>'required',
        ]);

        $event->MatchNo=$request->matchNo;
        $event->Uni1=$request->uniid1;
        $event->Uni2=$request->uniid2;
        $event->SportGroup=$request->group;
        $event->Round=$request->round;
        $event->Sport=$request->Sport;
        $event->Date=$request->date;
        $event->Time=$request->time;
        $event->Venue=$request->venue;
        $event->Gender=$request->gender;

        $event->save();
        $groupNo = DB::table('sports__teams')
                        ->groupBy('Sport')
                        ->select('sports__teams.Sport')
                        ->get();
        $data=Player_Event::all();
        return view('Events')->with('tasks',$data)->with('groupNo',$groupNo);
    }

    public function UpdateEvent($MatchNo,$Sport){

         $task=Player_Event::where('MatchNo','LIKE','%'. $MatchNo . '%')->where('Sport','LIKE','%'.$Sport.'%')->first();
         return view('UpdateEventSchedule')->with('taskdata',$task);

   }
   public function UpdateEventSchedule(Request $request){

    //  dd($request);
        $matchNo=$request->matchno;
        $uniid1=$request->uniid1;
        $uniid2=$request->uniid2;
        $group=$request->group;
        $round=$request->round;
        $sport=$request->sport;
        $date=$request->date;
        $time=$request->time;
        $venue=$request->venue;
        $gender=$request->gender;
	$groupNo = DB::table('sports__teams')
                        ->groupBy('Sport')
                        ->select('sports__teams.Sport')
                        ->get();
        $data=Player_Event::all();

      Player_Event::where('MatchNo',$matchNo)->where('Sport',$sport)->update([
         'Uni1'=>$uniid1,
         'Uni2'=>$uniid2,
         'SportGroup'=>$group,
         'Round'=>$round,
         'Date' => $date,
         'Time' => $time,
         'Venue' => $venue,
         'Gender' => $gender,
     ]);

     $datas=Player_Event::all();
     return view('Events')->with('tasks',$datas)->with('groupNo',$groupNo);
 }
    public function DeleteEventSchedule($MatchNo,$Sport){

        $task = Player_Event::where('MatchNo','=',$MatchNo)->where('Sport','=',$Sport)->delete();
        $datas=Player_Event::all();
        $groupNo = DB::table('sports__teams')
                        ->groupBy('Sport')
                        ->select('sports__teams.Sport')
                        ->get();
        return view('Events',compact('groupNo'))->with('tasks',$datas);


    }

}
