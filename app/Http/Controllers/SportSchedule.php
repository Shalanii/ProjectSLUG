<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BaseballSchedule;
class SportSchedule extends Controller
{
    //
    public function BaseballSchedule(Request $request){
        $schedule= new BaseballSchedule;
        $schedule->MatchNo=$request->MatchNo;
        $schedule->Group=$request->Group;
        $schedule->uniID1=$request->uniID1;
        $schedule->uniID2=$request->uniID2;
        $schedule->date=$request->date;
        $schedule->time=$request->time;
        $schedule->venue=$request->venue;

        $schedule->save();
        
        $data=BaseballSchedule::all();
        //return database data
        return view('schedule.baseballSchedule')->with('tasks',$data);
    }
}
