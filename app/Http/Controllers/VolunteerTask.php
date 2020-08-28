<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Volunteer_Task;

class VolunteerTask extends Controller
{
    //save Volunteer task for database
    public function vTask(Request $request){
    $vTask = new Volunteer_Task;
/*
    $this->validate($request,[
        'VolunteerID'=>'required|max:4',
        'Task'=>'required|max:50',
       // 'Date'=>'required|date-format:"d-m-Y"',
        //'Time'=>'required|date-format:"H:i"',
        'Venue'=>'required'
    ]);*/

    $vTask->VolunteerID=$request->vid;
    $vTask->Task=$request->task;
    $vTask->Date=$request->date;
    $vTask->Time=$request->time;
    $vTask->Venue=$request->venue;

    $vTask->save();
    $data=Volunteer_Task::all();

    return view('Volunteer_Task')->with('tasks',$data);

    }


    public function UpdateVolunteer(Request $request){

        //  dd($request);
    $vid=$request->vid;
    $task=$request->task;
    $date=$request->date;
    $time=$request->time;
    $venue=$request->venue;
    Volunteer_Task::where('VolunteerID',$vid)->update([
        
        'VolunteerID' => $vid,
        'Task' => $task,
        'Date'=>$date,
        'Time'=>$time,
        'Venue'=>$venue,

     ]);

     $datas=Volunteer_Task::all();
     return view('Volunteer_Task')->with('tasks',$datas);

   }


   public function UpdateVolunteerTask($VolunteerID){

    $task=Volunteer_Task::where('VolunteerID','LIKE','%'. $VolunteerID . '%')->first();
    return view('UpdateVolunteerTask')->with('taskdata',$task);
    
    }
      //delete value VolunteerTask
      public function DeleteVolunteerTask($VolunteerID){
        
        $task = Volunteer_Task::where('VolunteerID','=',$VolunteerID)->delete();
        $datas=Volunteer_Task::all();

        return view('Volunteer_Task')->with('tasks',$datas);

    }


}
