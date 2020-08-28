<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Volunteer_Details;
class VolunteerController extends Controller
{
    //
    public function storeVolunteer(Request $request){

        $volunt = new Volunteer_Details;

        $this->validate($request,[
            'vId'=>'required|max:4',
            'name'=>'required|max:40|min:15',
            'regNum'=>'required|max:15',
            'faculty'=>'required|max:15',
            'committy'=>'required|max:50',
            'tel'=>'required|max:11|numeric',
            'email'=>'required|required|email|unique:users,email'
        ]);

        $volunt->VolunteerID=$request->vId;
        $volunt->Name=$request->name;
        $volunt->StudentRegNum=$request->regNum;
        $volunt->Faculty=$request->faculty;
        $volunt->Committy=$request->committy;
        $volunt->PhoneNumber=$request->tel;
        $volunt->Email=$request->email;
        $volunt->Gender=$request->gender;

        $volunt->save();
        $data=Volunteer_Details::all();
        return view('VolunteerStudent')->with('volunteer',$data);

    }

}
