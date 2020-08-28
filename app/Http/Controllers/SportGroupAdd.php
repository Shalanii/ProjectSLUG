<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BaseballMen_Groups;
class SportGroupAdd extends Controller
{
    //
    public function baseballGroup(Request $request){

        $baseballGroup = new BaseballMen_Groups;
        $baseballGroup->Group=$request->Group;
        $baseballGroup->uniID=$request->uniID;

        $baseballGroup->save();

        $baseballGroup=BaseballMen_Groups::all();
        //return database data
        return view('SportGroups.baseballGroupAdd')->with('tasks',$data);

    }



}
