<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
//use App\BaseballMen_Groups;
class DynamicDependent extends Controller
{
    //
    function index(){
        $groupNo = DB::table('baseball_men__groups')
                        ->groupBy('Group')
                        ->select('baseball_men__groups.Group')
                        ->get();
        return view('schedule.baseballSchedule')->with('groupNo',$groupNo);
    }

    
    function fetch(Request $request){
        
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');

        $data=DB::table('baseball_men__groups')
                ->where($select,$value)
                //->groupBy($dependent)
                ->get();
        $output='<option value="">Select'.ucfirst($dependent).'</option>';

        foreach($data as $row){
            $output .= '<option value="'.$row->uniID.'">
            ' .$row->uniID. '</option>';
        }
        echo $output;

    }


    function index1(){
        $Sport = DB::table('sport_groups')
                        //->groupBy('Sport')
                        ->select('sport_groups.Sport')->distinct()
                        ->get();
        return view('SportGroups.sportSchedule')->with('Sport',$Sport);
    }
    function fetch1(Request $request){
        
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');

        $data1=DB::table('sport_groups')
                ->where($select,$value)
                ->select($dependent)->distinct()
                //->groupBy($dependent)
                ->get();
        $output = '<option value="">Select '.ucfirst($dependent).'</option>';
        //return $output;
        foreach($data1 as $row){
            $output .= '<option value="'.$row->$dependent.'">
            ' .$row->$dependent. '</option>';
        }
        echo $output;

    }
}
