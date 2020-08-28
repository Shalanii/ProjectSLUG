<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notices;

class SportNotices extends Controller
{
    //
    public function getNotices(){
        $data = Notices::all();
	if(count($data)>0){
        	return view('Notices.notices')->with('tasks',$data);
	}
	else{
		return view('Notices.notices')->with('message','No Notices Found');	
	}
    }
    public function saveNotice(Request $request){
        $notice=new Notices;

        $this->validate($request,[
            'Date'=>'required',
            'Time'=>'required',
            'Title'=>'required',
            'Notice'=>'required',
        ]);

        $notice->Date=$request->Date;
        $notice->Time=$request->Time;
        $notice->Title=$request->Title;
        $notice->Notice=$request->Notice;
        $notice->save();

        $data = Notices::all();
        return view('Notices.addNotices')->with('tasks',$data);

    }

    public function deleteNotices($NoticeID){
        $task=Notices::where('NoticeID','=',$NoticeID)->delete();
        $data = Notices::all();
        return view('Notices.addNotices')->with('tasks',$data);
    }
    public function UpdateNoticeView($NoticeID){
        $data = Notices::where('NoticeID','=',$NoticeID)->first();
        return view('Notices.updateNotice')->with('notices',$data);

    }

    public function UpdateNoticeView(Request $request){
        $Date=$request->Date;
        $Time=$request->Time;
        $Title=$request->Title;
        $Notice=$request->Notice;

        Notices::where('NoticeID',$NoticeID)->update([
            'Date'=>$Date,
            'Time'=>$Time,
            'Title'=>$Title,
            'Notice'=>$Notice,
        ]);

        $datas=Notices::all();
        return view('Notices.addNotices')->with('tasks',$datas);

    }
    public function UpdateNotice(Request $request){

        $Date=$request->Date;
        $Time=$request->Time;
        $Title=$request->Title;
        $Notice=$request->Notice;

        Notices::where('NoticeID',$NoticeID)->update([
            'Date'=>$Date,
            'Time'=>$Time,
            'Title'=>$Title,
            'Notice'=>$Notice,
        ]);

        $datas=Notices::all();
        return view('Notices.addNotices')->with('tasks',$datas);

    }



}
