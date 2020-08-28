<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Request;
use DB;
use App\TaekwondoSparring;
use App\IndividualPoomsae;
use App\TeamPoomsae;
use App\Chess;
use App\Elle;
use App\FootBall;
use App\Hockey;
use App\Baseball;
use App\Basketball;
use App\Netball;
use App\BadmintonGames;
use App\Badminton;
use App\RoadRace;
use App\Rowing;
use App\Volleyball;
use App\VolleyballGames;
use App\Wrestling;
use App\Weightlifting;
use App\Cricket;
use App\TableTennisGames;
use App\TableTennis;
use App\RugbyFootball;
use App\Karate_Kata;
use App\Karate_Kumite;
use App\TrackField;
use App\Running;
use App\JumpingEvent;
use App\ThrowingEvent;
use App\Carrom;
use App\Tennis;
use App\Swimming;
use App\SwimmingTeam;

class AddAllSportsResult extends Controller
{
    //
    public function saveChessResult(Request $request){

        $chess = new Chess;
        
        $this->validate($request,[
            'Date'=>'required',
            'MatchNo'=>'required|numeric',
            'Round'=>'required',
            'Uni1'=>'required',
            'Uni1_Score'=>'required|numeric',
            'Uni2'=>'required',
            'Uni2_Score'=>'required|numeric',
            'Gender'=>'required',
        ]);
            $uni1=$request->Uni1;
            $uni2=$request->Uni2;

        if($uni1!=$uni2){

            $chess->Date=$request->Date;
            $chess->MatchNo=$request->MatchNo;
            $chess->Round=$request->Round;
            $chess->Uni1=$request->Uni1;
            $chess->Uni1_Score=$request->Uni1_Score;
            $chess->Uni2=$request->Uni2;
            $chess->Uni2_Score=$request->Uni2_Score;
            $chess->Gender=$request->Gender;

            if($request->Uni1_Score>$request->Uni2_Score){
                $chess->Winner=$request->Uni1;
            }
            elseif($request->Uni1_Score<$request->Uni2_Score){
                $chess->Winner=$request->Uni2;
            }
            else{
                $chess->Winner="DRAW";  
            }

            $chess->save();

            $data=Chess::all();
            return view('AllSportResult.chessResult')->with('tasks',$data)->with('msg','result insert successfully');
        }
        else{

            return view('AllSportResult.chessResult')->with('error','insert error value!');

        }

    }

    public function deleteChessResult($MatchNo,$Round){
        $task = Chess::where('MatchNo','=',$MatchNo)->where('Round','=',$Round)->delete();
        // $player=DB::table('player__sports')
        // ->join('players','player__sports.PlayerID','=','players.PlayerID')
        // ->where('player__sports.Sport','Chess')
        // //->where('players.UniID',$request->Uni1)
        // ->select('Players.Name')
        // ->get();
        $data = Chess::all();
        return view('AllSportResult.chessResult',compact('player'))->with('tasks',$data)->with('msg','result delete successfully');
    }

    public function saveElleResult(Request $request){

        $elle=new Elle;

        $this->validate($request,[
            'Date'=>'required',
            'MatchNo'=>'required|numeric',
            'Round'=>'required',
            //'SportGroup'=>'required',
            'Uni1'=>'required',
            'Uni1_Score'=>'required|numeric',
            'Uni2'=>'required',
            'Uni2_Score'=>'required|numeric',
            'Gender'=>'required',
		//'toss'=>'required',
        ]);
        $uni1 = $request->Uni1;
        $uni2 = $request->Uni2;
        if($uni1!=$uni2){
            $elle->Date=$request->Date;
            $elle->MatchNo=$request->MatchNo;
            $elle->Round=$request->Round;
            $elle->SportGroup=$request->SportGroup;
            $elle->Uni1=$request->Uni1;
            $elle->Uni1_Score=$request->Uni1_Score;
            $elle->Uni2=$request->Uni2;
            $elle->Uni2_Score=$request->Uni2_Score;
	    $elle->toss=$request->toss;

                if($request->Uni1_Score>$request->Uni2_Score){
                    $elle->Winner=$request->Uni1;
                }
                elseif($request->Uni1_Score<$request->Uni2_Score){
                    $elle->Winner=$request->Uni2;
                }
                else{
                    $elle->Winner="DRAW";  
                }
            $elle->Gender=$request->Gender;
            $elle->save();
            $data = Elle::all();
            return view('AllSportResult.elleResult')->with('tasks',$data)->with('msg','result insert successfully');
        }
        else{
            return view('AllSportResult.elleResult')->with('error','error insert value');  
        }

    }
    public function deleteElleResult($MatchNo,$Gender){
        $task=Elle::where('MatchNo','=',$MatchNo)->where('Gender','=',$Gender)->delete();
        $data = Elle::all();
        return view('AllSportResult.elleResult')->with('tasks',$data)->with('msg','result delete successfully');
    }
    public function UpdateElleView($MatchNo,$Gender){

        $data = Elle::where('MatchNo','LIKE','%'.$MatchNo.'%')->where('Gender','LIKE','%'.$Gender.'%')->first();
        return view('UpdateSportResult.updateElleResult')->with('elledata',$data);

    }
    public function UpdateElleResult(Request $request){

        $MatchNo=$request->MatchNo;
        $Round=$request->Round;
        $SportGroup=$request->SportGroup;
        $Uni1=$request->Uni1;
        $Uni1_Score=$request->Uni1_Score;
        $Uni1_Result=$request->Uni1_Result;
        $Uni2=$request->Uni2;
        $Uni2_Score=$request->Uni2_Score;
        $Uni2_Result=$request->Uni2_Result;
        $Uni2_Score=$request->Uni2_Score;
        $Gender=$request->Gender;

        Elle::where('MatchNo',$MatchNo)->where('Gender',$Gender)->update([
            'Round'=>$Round,
            'SportGroup'=>$SportGroup,
            'Uni1'=>$Uni1,
            'Uni1_Score'=>$Uni1_Score,
            'Uni1_Result'=>$Uni1_Result,
            'Uni2'=>$Uni2,
            'Uni2_Score'=>$Uni2_Score,
            'Uni2_Result'=>$Uni2_Result,
        ]);

        $datas=Elle::all();
        return view('AllSportResult.elleResult')->with('tasks',$datas);

    }


    public function saveFootballResult(Request $request){

        $football=new FootBall;

        $this->validate($request,[
            'Date'=>'required',
            'MatchNo'=>'required|numeric',
            'Round'=>'required',
            //'SportGroup'=>'required',
            'Uni1'=>'required',
            //'Uni1_Score'=>'required|numeric',
            'Uni2'=>'required',
            //'Uni2_Score'=>'required|numeric',
        ]);
        $uni1=$request->Uni1;
        $uni2=$request->Uni2;
        if($uni1!=$uni2){
        $football->Date=$request->Date;
        $football->MatchNo=$request->MatchNo;
        $football->Round=$request->Round;
        $football->SportGroup=$request->SportGroup;
        $football->Uni1=$request->Uni1;
        $football->Uni1_Score=$request->Uni1_Score;
        $football->Uni2=$request->Uni2;
        $football->Uni2_Score=$request->Uni2_Score;
	$football->Description=$request->Description;
            if($request->Uni1_Score>$request->Uni2_Score){
            $football->Winner=$request->Uni1;
            }
            elseif($request->Uni1_Score<$request->Uni2_Score){
            $football->Winner=$request->Uni2;
            }
            else{
            $football->Winner="DRAW";  
            }

            $football->save();

            $data = FootBall::all();
            return view('AllSportResult.football')->with('tasks',$data)->with('msg','result insert successfully');
        }
        else{
            return view('AllSportResult.football')->with('error','error insert value');
        }
    }

    public function deleteFootballResult($MatchNo){
        $task=FootBall::where('MatchNo','=',$MatchNo)->delete();
        $data=FootBall::all();
        return view('AllSportResult.football')->with('tasks',$data)->with('msg','result delete successfully');
    }
    public function UpdateFootballView($MatchNo){
        $data = FootBall::where('MatchNo','LIKE','%'.$MatchNo.'%')->first();
        return view('UpdateSportResult.updateFootballResult')->with('footballdata',$data);
    }
    public function UpdateFootballResult(Request $request){

        $MatchNo=$request->MatchNo;
        $Round=$request->Round;
        $SportGroup=$request->SportGroup;
        $Uni1=$request->Uni1;
        $Uni1_Score=$request->Uni1_Score;
        $Uni1_Result=$request->Uni1_Result;
        $Uni2=$request->Uni2;
        $Uni2_Score=$request->Uni2_Score;
        $Uni2_Result=$request->Uni2_Result;
        $Uni2_Score=$request->Uni2_Score;

        FootBall::where('MatchNo',$MatchNo)->update([
            'Round'=>$Round,
            'SportGroup'=>$SportGroup,
            'Uni1'=>$Uni1,
            'Uni1_Score'=>$Uni1_Score,
            'Uni1_Result'=>$Uni1_Result,
            'Uni2'=>$Uni2,
            'Uni2_Score'=>$Uni2_Score,
            'Uni2_Result'=>$Uni2_Result,
        ]);

        $datas=FootBall::all();
        return view('AllSportResult.football')->with('tasks',$datas);
    }



    public function saveHockeyResult(Request $request){

        $hockey=new Hockey;

        $this->validate($request,[
            'Date'=>'required',
            'MatchNo'=>'required|numeric',
            'Round'=>'required',
            'Uni1'=>'required',
            'Uni1_Score'=>'required|numeric',
            'Uni2'=>'required',
            'Uni2_Score'=>'required|numeric',
            'Gender'=>'required',
        ]);
        $uni1=$request->Uni1;
        $uni2=$request->Uni2;
        if($uni1!=$uni2){
            $hockey->Date=$request->Date;
            $hockey->MatchNo=$request->MatchNo;
            $hockey->Round=$request->Round;
            $hockey->SportGroup=$request->SportGroup;
            $hockey->Uni1=$request->Uni1;
            $hockey->Uni1_Score=$request->Uni1_Score;
            $hockey->Uni2=$request->Uni2;
            $hockey->Uni2_Score=$request->Uni2_Score;
            $hockey->Gender=$request->Gender;
                if($request->Uni1_Score>$request->Uni2_Score){
                $hockey->Winner=$request->Uni1;
                }
                elseif($request->Uni1_Score<$request->Uni2_Score){
                $hockey->Winner=$request->Uni2;
                }
                else{
                $hockey->Winner="DRAW";  
                }
                
            $hockey->save();
            $data = Hockey::all();
            return view('AllSportResult.hockey')->with('tasks',$data)->with('msg','result insert successfully');
        }
        else{
            return view('AllSportResult.hockey')->with('error','error insert value'); 
        }

    }

    public function deleteHockeyResult($MatchNo,$Gender){

        $task = Hockey::where('MatchNo','=',$MatchNo)->where('Gender','=',$Gender)->delete();
        $datas=Hockey::all();
        return view('AllSportResult.hockey')->with('tasks',$datas)->with('msg','result delete successfully');

    }

    public function UpdateHockeyView($MatchNo,$Gender){
        $data = Hockey::where('MatchNo','LIKE','%'.$MatchNo.'%')->where('Gender','LIKE','%'.$Gender.'%')->first();
        return view('UpdateSportResult.updateHockeyResult')->with('hockeydata',$data);
    }
    public function UpdateHockeyResult(Request $request){

        $MatchNo=$request->MatchNo;
        $Round=$request->Round;
        $SportGroup=$request->SportGroup;
        $Uni1=$request->Uni1;
        $Uni1_Score=$request->Uni1_Score;
        $Uni1_Result=$request->Uni1_Result;
        $Uni2=$request->Uni2;
        $Uni2_Score=$request->Uni2_Score;
        $Uni2_Result=$request->Uni2_Result;
        $Uni2_Score=$request->Uni2_Score;
        $Gender=$request->Gender;

        Hockey::where('MatchNo',$MatchNo)->where('Gender',$Gender)->update([
            'Round'=>$Round,
            'SportGroup'=>$SportGroup,
            'Uni1'=>$Uni1,
            'Uni1_Score'=>$Uni1_Score,
            'Uni1_Result'=>$Uni1_Result,
            'Uni2'=>$Uni2,
            'Uni2_Score'=>$Uni2_Score,
            'Uni2_Result'=>$Uni2_Result,
        ]);

        $datas=Hockey::all();
        return view('AllSportResult.hockey')->with('tasks',$datas);
    }

    public function saveBaseballResult(Request $request){

        $baseball=new Baseball;

        $this->validate($request,[
            'Date'=>'required',
            'MatchNo'=>'required|numeric',
            'Round'=>'required',
            //'SportGroup'=>'required',
            'Uni1'=>'required',
            'Uni1_Score'=>'required|numeric',
            'Uni2'=>'required',
            'Uni2_Score'=>'required|numeric',
        ]);

        $uni1Score = $request->Uni1_Score;
        $uni2Score = $request->Uni2_Score;
        $x=$request->Uni1;
        $y=$request->Uni2;
        if($x!=$y){
        $baseball->Date=$request->Date;
        $baseball->MatchNo=$request->MatchNo;
        $baseball->Round=$request->Round;
        $baseball->SportGroup=$request->SportGroup;
        $baseball->Uni1=$request->Uni1;
        $baseball->Uni1_Score=$request->Uni1_Score;
        $baseball->Uni2=$request->Uni2;
        $baseball->Uni2_Score=$request->Uni2_Score;
        if($uni1Score>$uni2Score){
            $baseball->Winner=$baseball->Uni1;   
        }
        elseif($uni1Score<$uni2Score){
            $baseball->Winner=$baseball->Uni2;
        }
        else{
            $baseball->Winner="DRAW";
        }

        $baseball->save();

        $data = Baseball::orderBy('MatchNo','desc')->get();
        return view('AllSportResult.baseball')->with('tasks',$data)->with('msg','result insert successfully');
    }
    else{
        return view('AllSportResult.baseball')->with('error','!error insert value');
    }

    }
    public function deleteBaseballResult($MatchNo){

        $task = Baseball::where('MatchNo','=',$MatchNo)->delete();
        $datas=Baseball::all();
        return view('AllSportResult.baseball')->with('tasks',$datas)->with('msg','result delete successfully');

    }
    public function UpdateBaseballView($MatchNo){
        $data = Baseball::where('MatchNo','LIKE','%'.$MatchNo.'%')->first();
        return view('UpdateSportResult.updateBaseballResult')->with('baseballdata',$data);
    }
    public function UpdateBaseballResult(Request $request){

        $winner =new  Baseball;
        $date = $request->Date;
        $MatchNo=$request->MatchNo;
        $Round=$request->Round;
        $SportGroup=$request->SportGroup;
        $Uni1=$request->Uni1;
        $Uni1_Score=$request->Uni1_Score;
        $Uni2=$request->Uni2;
        $Uni2_Score=$request->Uni2_Score;
        $Uni2_Score=$request->Uni2_Score;
        $Uni2_Result=$winner->Winner;
        $Gender=$request->Gender;

        Baseball::where('MatchNo',$MatchNo)->where('Gender',$Gender)->update([
            'Date'=>$date,
            'Round'=>$Round,
            'SportGroup'=>$SportGroup,
            'Uni1'=>$Uni1,
            'Uni1_Score'=>$Uni1_Score,
            'Uni2'=>$Uni2,
            'Uni2_Score'=>$Uni2_Score,
            'Winner'=>$Uni2_Result,
        ]);

        $datas=Baseball::all();
        return view('AllSportResult.Baseball')->with('tasks',$datas);
    }



    public function saveBasketballResult(Request $request){

        $basketball=new Basketball;

        $this->validate($request,[
            'Date'=>'required',
            'MatchNo'=>'required|numeric',
            'Round'=>'required',         
            'Uni1'=>'required',
            'Uni1_Score'=>'required|numeric',
            'Uni2'=>'required',
            'Uni2_Score'=>'required|numeric',
            'Gender'=>'required',
        ]);

        $uni1 = $request->Uni1;
        $uni2 = $request->Uni2;
        if($uni1!=$uni2){
            $basketball->Date=$request->Date;
            $basketball->MatchNo=$request->MatchNo;
            $basketball->Round=$request->Round;
            $basketball->SportGroup=$request->SportGroup;
            $basketball->Uni1=$request->Uni1;
            $basketball->Uni1_Score=$request->Uni1_Score;
            $basketball->Uni2=$request->Uni2;
            $basketball->Uni2_Score=$request->Uni2_Score;
            $basketball->Gender=$request->Gender;
            if($request->Uni1_Score>$request->Uni2_Score){
            $basketball->Winner=$request->Uni1;
            }
            elseif($request->Uni1_Score<$request->Uni2_Score){
            $basketball->Winner=$request->Uni2;
            }
            else{
            $basketball->Winner="DRAW";  
            }
            $basketball->save();

            $data = Basketball::all();
            return view('AllSportResult.basketball')->with('tasks',$data)->with('msg','result insert successfully');
        }
        else{
            return view('AllSportResult.basketball')->with('error','error insert value');
        }
       // return view('AllSportResult.basketball')->with('response','Basketball Result Entry Successfull!');

    }
    public function deleteBasketballResult($MatchNo,$Gender){

        $task = Basketball::where('MatchNo','=',$MatchNo)->where('Gender','=',$Gender)->delete();
        $datas=Basketball::all();
        return view('AllSportResult.basketball')->with('tasks',$datas)->with('msg','result delete successfully');

    }
    public function UpdateBasketballView($MatchNo,$Gender){
        $data = Basketball::where('MatchNo','LIKE','%'.$MatchNo.'%')->where('Gender','LIKE','%'.$Gender.'%')->first();
        return view('UpdateSportResult.updateBasketballResult')->with('basketballdata',$data);
    }
    public function UpdateBasketballResult(Request $request){

        $MatchNo=$request->MatchNo;
        $Round=$request->Round;
        $SportGroup=$request->SportGroup;
        $Uni1=$request->Uni1;
        $Uni1_Score=$request->Uni1_Score;
        $Uni1_Result=$request->Uni1_Result;
        $Uni2=$request->Uni2;
        $Uni2_Score=$request->Uni2_Score;
        $Uni2_Result=$request->Uni2_Result;
        $Uni2_Score=$request->Uni2_Score;
        $Gender=$request->Gender;

        Basketball::where('MatchNo',$MatchNo)->where('Gender',$Gender)->update([
            'Round'=>$Round,
            'SportGroup'=>$SportGroup,
            'Uni1'=>$Uni1,
            'Uni1_Score'=>$Uni1_Score,
            'Uni1_Result'=>$Uni1_Result,
            'Uni2'=>$Uni2,
            'Uni2_Score'=>$Uni2_Score,
            'Uni2_Result'=>$Uni2_Result,
        ]);

        $datas=Basketball::all();
        return view('AllSportResult.Basketball')->with('tasks',$datas);
    }



    public function saveNetballResult(Request $request){

        $netball=new Netball;
        
        $this->validate($request,[
            'Date'=>'required',
            'MatchNo'=>'required|numeric',
            'Round'=>'required',
            //'SportGroup'=>'required',
            'Uni1'=>'required',
            'Uni1_Score'=>'required|numeric',
            'Uni2'=>'required',
            'Uni2_Score'=>'required|numeric',
            
        ]);

        $uni1=$request->Uni1;
        $uni2=$request->Uni2;
        if($uni1!=$uni2){

            $netball->Date=$request->Date;
            $netball->MatchNo=$request->MatchNo;
            $netball->Round=$request->Round;
            $netball->SportGroup=$request->SportGroup;
            $netball->Uni1=$request->Uni1;
            $netball->Uni1_Score=$request->Uni1_Score;
            $netball->Uni2=$request->Uni2;
            $netball->Uni2_Score=$request->Uni2_Score;
                if($request->Uni1_Score>$request->Uni2_Score){
                $netball->Winner=$request->Uni1;
                }
                elseif($request->Uni1_Score<$request->Uni2_Score){
                $netball->Winner=$request->Uni2;
                }
                else{
                $netball->Winner="DRAW";  
                }
            $netball->save();
            $data = Netball::all();
            return view('AllSportResult.Netball')->with('tasks',$data)->with('msg','result insert successfully');
        }   
        else{
            return view('AllSportResult.Netball')->with('error','error insert value');  
        }

    }
    public function deleteNetballResult($MatchNo){

        $task = Netball::where('MatchNo','=',$MatchNo)->delete();
        $datas=Netball::all();
        return view('AllSportResult.Netball')->with('tasks',$datas)->with('msg','result insert successfully');

    }
    public function UpdateNetballView($MatchNo){
        $data = Netball::where('MatchNo','LIKE','%'.$MatchNo.'%')->first();
        return view('UpdateSportResult.updateNetballResult')->with('netballdata',$data);
    }
    public function UpdateNetballResult(Request $request){

        $MatchNo=$request->MatchNo;
        $Round=$request->Round;
        $SportGroup=$request->SportGroup;
        $Uni1=$request->Uni1;
        $Uni1_Score=$request->Uni1_Score;
        $Uni1_Result=$request->Uni1_Result;
        $Uni2=$request->Uni2;
        $Uni2_Score=$request->Uni2_Score;
        $Uni2_Result=$request->Uni2_Result;
        $Uni2_Score=$request->Uni2_Score;

        Netball::where('MatchNo',$MatchNo)->update([
            'Round'=>$Round,
            'SportGroup'=>$SportGroup,
            'Uni1'=>$Uni1,
            'Uni1_Score'=>$Uni1_Score,
            'Uni1_Result'=>$Uni1_Result,
            'Uni2'=>$Uni2,
            'Uni2_Score'=>$Uni2_Score,
            'Uni2_Result'=>$Uni2_Result,
        ]);

        $datas=Netball::all();
        return view('AllSportResult.netball')->with('tasks',$datas);
    }
    /*
    public function viewBadmintonGamesResult(){
        $data=BadmintonGames::all();
        return view('AllSportResult.badmintonGames')->with('tasks',$data);

    }
   
    public function fetch(Request $request){
        if($request->get('query')){
            $query=$request->get('query');
            $data = DB::table('players')->where('Name','LIKE','%{query}%')
                    ->get();
            $output='<ul class="dropdown-menu"
                    style="display:block;
                    position:relative">';
            foreach($data as $row){
                $output .='<li><a href="#">'
                    .$row->Name.'</a></li>';
            }
                $output .='</ul>';
                echo $output;

        }
    }
    */

    public function saveBadmintonGamesResult(Request $request){

        $badminton = new BadmintonGames;

        $this->validate($request,[
            'Gender'=>'required',
            'Round'=>'required',
            'MatchNo'=>'required|numeric',
            'MatchCategory'=>'required',
            'u1p1'=>'required',
            'uni1'=>'required',
            'points1'=>'required|numeric',
            'u2p1'=>'required',
            'uni2'=>'required',
            'points2'=>'required|numeric',
            
        ]);

        $player=DB::table('players')
                    ->where('Sport','badminton')
                    //->where('players.UniID',$request->Uni1)
                    ->select('players.Name')
                    ->get();

        $uni1=$request->uni1;
        $uni2=$request->uni2;



        if($uni1!=$uni2){

            $badminton->Gender=$request->Gender;
            $badminton->Round=$request->Round;
            $badminton->MatchNo=$request->MatchNo;
            $badminton->MatchCategory=$request->MatchCategory;
            $badminton->Uni1_P1=$request->u1p1;
            $badminton->Uni1_P2=$request->u1p2;
            $badminton->Uni1=$request->uni1;
            $badminton->Uni1_Points=$request->points1;
            $badminton->Uni2_P1=$request->u2p1;
            $badminton->Uni2_P2=$request->u2p2;
            $badminton->Uni2=$request->uni2;
            $badminton->Uni2_Points=$request->points2;
            

            $badminton->save();
            $data = BadmintonGames::all();
            return view('AllSportResult.badmintonGames',compact('player'))->with('tasks',$data)->with('msg','result insert successfully');
        }
        else{
            return view('AllSportResult.badmintonGames')->with('error','error insert value');
        }
       
    }
    
    public function deleteBadmintonGamesResult($MatchNo,$Gender,$MatchCategory){
        $player=DB::table('players')
                ->where('Sport','badminton')
                //->where('players.UniID',$request->Uni1)
                ->select('Name')
                ->orderBy('Name','asc')
                ->get();

        $task = BadmintonGames::where('MatchNo','=',$MatchNo)->where('Gender','=',$Gender)->where('MatchCategory','=',$MatchCategory)->delete();
        $datas=BadmintonGames::all();
        return view('AllSportResult.badmintonGames',compact('player'))->with('tasks',$datas)->with('msg','result delete successfully');

    }

    public function UpdateBadmintonGamesView($MatchNo,$Gender,$MatchCategory){
        $data = BadmintonGames::where('MatchNo','LIKE','%'.$MatchNo.'%')->where('Gender','LIKE','%'.$Gender.'%')->where('MatchCategory','LIKE','%'.$MatchCategory.'%')->first();
        return view('UpdateSportResult.UpdateBadmintonGamesResult')->with('badmintongamesdata',$data);
    }
    /*
    public function UpdateBadmintonGamesResult(Request $request){

        $Gender=$request->Gender;
        $Round=$request->Round;
        $MatchNo=$request->MatchNo;
        $SportGroup=$request->SportGroup;
        $Uni1=$request->Uni1;
        $Uni1_Score=$request->Uni1_Score;
        $Uni1_Result=$request->Uni1_Result;
        $Uni2=$request->Uni2;
        $Uni2_Score=$request->Uni2_Score;
        $Uni2_Result=$request->Uni2_Result;
        $Uni2_Score=$request->Uni2_Score;

        BadmintonGames::where('MatchNo',$MatchNo)->where('Gender',$Gender)->where('MatchCategory',$MatchCategory)->update([
            'Round'=>$Round,
            'SportGroup'=>$SportGroup,
            'Uni1'=>$Uni1,
            'Uni1_Score'=>$Uni1_Score,
            'Uni1_Result'=>$Uni1_Result,
            'Uni2'=>$Uni2,
            'Uni2_Score'=>$Uni2_Score,
            'Uni2_Result'=>$Uni2_Result,
        ]);

        $datas=BadmintonGames::all();
        return view('AllSportResult.BadmintonGames')->with('tasks',$datas);
    }
    */

    public function saveBadmintonResult(Request $request){

        $badminton = new Badminton;

        $this->validate($request,[
            'Date'=>'required',
            'Gender'=>'required',
            'MatchNo'=>'required|numeric',
            'Round'=>'required',
            'uni1'=>'required',
            'uni1_wins'=>'required|numeric|max:3',
            'uni2'=>'required',
            'uni2_wins'=>'required|numeric|max:3',
            
        ]);
        
       
        $x=$request->uni1_wins;
        $y=$request->uni2_wins;
        $uni1 = $request->uni1;
        $uni2 = $request->uni2;

        if($uni1!=$uni2){
            $badminton->Date=$request->Date;
            $badminton->Gender=$request->Gender;
            $badminton->MatchNo=$request->MatchNo;
            $badminton->Round=$request->Round;
            $badminton->SportGroup=$request->SportGroup;
            $badminton->Uni1=$request->uni1;
            $badminton->Uni1_Wins=$request->uni1_wins;
            $badminton->Uni2=$request->uni2;
            $badminton->Uni2_Wins=$request->uni2_wins;
            if($x>$y){
                $badminton->Winner=$request->uni1;
            }
            else if($x<$y){
                $badminton->Winner=$request->uni2;
            }
            else{
                $badminton->Winner="DRAW";
            }

                $badminton->save();                
                $data = Badminton::all();
                return view('AllSportResult.badminton')->with('tasks',$data)->with('msg','result insert successfully');;
        }
        else{
                return view('AllSportResult.badminton')->with('error','!error insert value');
        }

    }
    public function deleteBadmintonResult($MatchNo,$Gender){

        $task = Badminton::where('MatchNo','=',$MatchNo)->where('Gender','=',$Gender)->delete();
        $datas=Badminton::all();
        return view('AllSportResult.badminton')->with('tasks',$datas)->with('msg','result delete successfully');;

    }


    public function saveRoadRaceResult(Request $request){

        $roadrace = new RoadRace;

        
        $this->validate($request,[
            'Date'=>'required',
            'UniID'=>'required',
            'PlayerName'=>'required',
            'Time'=>'required',
            'Rank'=>'required',
        ]);
        $player=DB::table('players')
        ->where('Sport','road race')
        //->where('players.UniID',$request->Uni1)
        ->select('Name')
        ->orderBy('Name','asc')
        ->get();



        $roadrace->Date=$request->Date;
        $roadrace->Uni=$request->UniID;
        $roadrace->PlayerName=$request->PlayerName;
        $roadrace->Time=$request->Time;
        $roadrace->Rank=$request->Rank;

        $roadrace->save();

        $data = RoadRace::all();
        return view('AllSportResult.roadrace',compact('player'))->with('tasks',$data);

    }
    public function deleteRoadraceResult($Uni,$PlayerName){

        $player=DB::table('players')
                ->where('Sport','road race')
                //->where('players.UniID',$request->Uni1)
                ->select('Name')
                ->orderBy('Name','asc')
                ->get();

        $task = RoadRace::where('Uni','=',$Uni)->where('PlayerName','=',$PlayerName)->delete();
        $datas=RoadRace::all();
        return view('AllSportResult.roadrace',compact('player'))->with('tasks',$datas);

    }

    public function saveRowingResult(Request $request){

        $rowing = new Rowing;

        

        $this->validate($request,[
            'Date'=>'required',
            'MatchNo'=>'required|numeric',
            'Gender'=>'required',
            'MatchCategory'=>'required',
            'Uni'=>'required',
            'Player1'=>'required',
            'FinishTime'=>'required',
            'Rank'=>'required',
        ]);
        $player=DB::table('players')
                ->where('Sport','rowing')
                //->where('players.UniID',$request->Uni1)
                ->select('Name')
                ->orderBy('Name','asc')
                ->get();
        $uniID=DB::table('unis')->where('UniID','=','MOR')
                ->orWhere('UniID','=','COL')
                ->select('UniID')
                ->get();
        $rowing->Date=$request->Date;
        $rowing->MatchNo=$request->MatchNo;
        $rowing->Gender=$request->Gender;
        $rowing->MatchCategory=$request->MatchCategory;
        $rowing->Uni=$request->Uni;
        $rowing->Player1=$request->Player1;
        $rowing->Player2=$request->Player2;
        $rowing->Player3=$request->Player3;
        $rowing->Player4=$request->Player4;
        $rowing->FinishTime=$request->FinishTime;
        $rowing->Rank=$request->Rank;
        $rowing->save();

        $data = Rowing::all();
        return view('AllSportResult.rowing',compact('player'))->with('tasks',$data)->with('uniID',$uniID);

    }
    public function deleteRowingResult($Gender,$Uni,$MatchNo){
        $player=DB::table('players')
                ->where('Sport','rowing')
                //->where('players.UniID',$request->Uni1)
                ->select('Name')
                ->orderBy('Name','asc')
                ->get();
	$uniID=DB::table('unis')->where('UniID','=','MOR')
                ->orWhere('UniID','=','COL')
                ->select('UniID')
                ->get();

        $task = Rowing::where('Gender','=',$Gender)->where('Uni','=',$Uni)->where('MatchNo','=',$MatchNo)->delete();
        $datas=Rowing::all();
        return view('AllSportResult.rowing',compact('player'))->with('tasks',$datas)->with('uniID',$uniID);

    }



    public function saveVolleyballResult(Request $request){

        $volly = new Volleyball;

        $this->validate($request,[
            'Date'=>'required',
            'Gender'=>'required',
            'MatchNo'=>'required|numeric',
            'Round'=>'required',
            'SportGroup'=>'required',
            'uni1'=>'required',
            'uni1_wins'=>'required|numeric',
            'uni2'=>'required',
            'uni2_wins'=>'required|numeric',

        ]);

        $uni1=$request->uni1;
        $uni2=$request->uni2;

        if($uni1!=$uni2){
            $volly->Date=$request->Date;
            $volly->Gender=$request->Gender;
            $volly->MatchNo=$request->MatchNo;
            $volly->Round=$request->Round;
            $volly->SportGroup=$request->SportGroup;
            $volly->Uni1=$request->uni1;
            $volly->Uni1_Wins=$request->uni1_wins;
            $volly->Uni2=$request->uni2;
            $volly->Uni2_Wins=$request->uni2_wins;

            if($request->uni1_wins>$request->uni2_wins)
            {
                $volly->Winner=$request->uni1;
            }
            elseif($request->uni1_wins<$request->uni2_wins)
            {
                $volly->Winner=$request->uni2;
            }
            else{
                $volly->Winner="DRAW";  
            }
            $volly->save();

            $data = Volleyball::all();
            return view('AllSportResult.vollyball')->with('tasks',$data);
        }
        else{
            return view('AllSportResult.vollyball')->with('error','error value insert');
        }
       
    }
    public function deleteVolleyballResult($MatchNo,$Gender,$Uni1,$Uni2){

        $task = Volleyball::where('MatchNo','=',$MatchNo)->where('Gender','=',$Gender)->where('Uni1','=',$Uni1)->where('Uni2','=',$Uni2)->delete();
        $datas=Volleyball::all();
        return view('AllSportResult.vollyball')->with('tasks',$datas);

    }

    public function saveVolleyballGamesResult(Request $request){

        $VollyGames = new VolleyballGames;

        $this->validate($request,[
            'Gender'=>'required',
            'Round'=>'required',
            'MatchNo'=>'required|numeric',
            'MatchCategory'=>'required',
            'uni1'=>'required',
            'points1'=>'required|numeric',
            'uni2'=>'required',
            'points2'=>'required|numeric',
        ]);

        $uni1Score = $request->points1;
        $uni2Score = $request->points2;

        $VollyGames->Gender=$request->Gender;
        $VollyGames->Round=$request->Round;
        $VollyGames->MatchNo=$request->MatchNo;
        $VollyGames->MatchCategory=$request->MatchCategory;
        $VollyGames->Uni1=$request->uni1;
        $VollyGames->Uni1_Points=$request->points1;
        $VollyGames->Uni2=$request->uni2;
        $VollyGames->Uni2_Points=$request->points2;

        $VollyGames->save();

        $data = VolleyballGames::all();
        return view('AllSportResult.volleyballGames')->with('tasks',$data);

    }
    
    public function deleteVolleyballGamesResult($Gender,$MatchNo,$MatchCategory){

        $task = VolleyballGames::where('MatchNo','=',$MatchNo)->where('Gender','=',$Gender)->where('MatchCategory','=',$MatchCategory)->delete();
        $datas=VolleyballGames::all();
        return view('AllSportResult.volleyballGames')->with('tasks',$datas);

    }


    public function saveWrestlingResult(Request $request){

        $wrestling = new Wrestling;

        $this->validate($request,[
            'Date'=>'required',
            'MatchNo'=>'required|numeric',
            'Round'=>'required',
            'WeightCategory'=>'required',
            'uni1'=>'required',
            'Uni1_Player'=>'required',
            'Uni1_Score'=>'required|numeric',
            'uni2'=>'required',
            'Uni2_Player'=>'required',
            'Uni2_Score'=>'required|numeric',
        ]);


        $uni1=$request->uni1;
        $uni2=$request->uni2;

        if($uni1!=$uni2){
        $wrestling->Date=$request->Date;
        $wrestling->MatchNo=$request->MatchNo;
        $wrestling->Round=$request->Round;
        $wrestling->WeightCategory=$request->WeightCategory;
        $wrestling->Uni1=$request->uni1;
        $wrestling->Uni1_Player=$request->Uni1_Player;
        $wrestling->Uni1_Score=$request->Uni1_Score;
        $wrestling->Uni2=$request->uni2;
        $wrestling->Uni2_Player=$request->Uni2_Player;
        $wrestling->Uni2_Score=$request->Uni2_Score;
        if($request->Uni1_Score>$request->Uni2_Score){
            $wrestling->Winner=$request->uni1;
        }
        elseif($request->Uni1_Score<$request->Uni2_Score){
            $wrestling->Winner=$request->uni2;
        }
        else{
            $wrestling->Winner="DRAW";
        }
        
        $wrestling->save();

        $data = Wrestling::all();
        return view('AllSportResult.wrestling')->with('tasks',$data);
    }
    else{
        return view('AllSportResult.wrestling')->with('error','error insert value'); 
    }

    }
    
    public function deleteWrestlingResult($MatchNo){

        $task = Wrestling::where('MatchNo','=',$MatchNo)->delete();
	$datas=Wrestling::all();
	$player=DB::table('players')
        ->where('Sport','wrestling')
        //->where('players.UniID',$request->Uni1)
        ->select('Name')
        ->orderBy('Name','asc')
        ->get();

        return view('AllSportResult.wrestling',compact('player'))->with('tasks',$datas);

    }




    public function saveWeightLiftingResult(Request $request){

        $weight = new Weightlifting;
        $player=DB::table('players')
        ->where('Sport','weightlifting')
        //->where('players.UniID',$request->Uni1)
        ->select('Name')
        ->orderBy('Name','asc')
        ->get();
        $this->validate($request,[
            'Date'=>'required',
            'MatchNo'=>'required|numeric',
            'WeightCategory'=>'required',
            'Uni'=>'required',
            'Player'=>'required',
            'Snatch'=>'required|numeric',
            'Clean_Jerk'=>'required',
            'Place'=>'required',
            'Gender'=>'required',
        ]);
        $weight->Date=$request->Date;
        $weight->MatchNo=$request->MatchNo;
        $weight->WeightCategory=$request->WeightCategory;
        $weight->Uni=$request->Uni;
        $weight->PlayerName=$request->Player;
        $weight->Snatch=$request->Snatch;
        $weight->Clean_and_Jerk=$request->Clean_Jerk;

        $snatchMax=$request->Snatch;
        $cleanMax=$request->Clean_Jerk;
        $total=$snatchMax+$cleanMax;
        $weight->Rank=$request->Place;
        $weight->Gender=$request->Gender;

        $weight->Total=$total;
    
        $weight->save();

        $data = Weightlifting::all();
        return view('AllSportResult.weightLifting',compact('player'))->with('tasks',$data);

    }
    
    public function deleteWeightLiftingResult($Uni,$Player){

        $task = Weightlifting::where('Uni','=',$Uni)->where('PlayerName','=',$Player)->delete();
        $datas=Weightlifting::all();
        $player=DB::table('players')
        ->where('Sport','weightlifting')
        //->where('players.UniID',$request->Uni1)
        ->select('Name')
        ->orderBy('Name','asc')
        ->get();
        return view('AllSportResult.weightLifting',compact('player'))->with('tasks',$datas);

    }

    public function viewCricketResult(){
        $data=Cricket::all();
        return view('AllSportResult.cricket')->with('tasks',$data);
    }
    public function saveCricketResult(Request $request){
        $cricket=new Cricket;

        $this->validate($request,[
            'Date'=>'required',
            'MatchNo'=>'required|numeric',
            'Round'=>'required',
            'Uni1'=>'required',
            'Uni1_Score'=>'required|numeric',
            'Uni1_Wickets'=>'required|numeric',
            'Uni1_Overs'=>'required|numeric',
            'Uni2'=>'required',
            'Uni2_Score'=>'required|numeric',
            'Uni2_Wickets'=>'required|numeric',
            'Uni2_Overs'=>'required|numeric',
            'Result_Description'=>'required',
        ]);

        $uni1=$request->Uni1;
        $uni2=$request->Uni2;
        if($uni1!=$uni2){
            $cricket->Date=$request->Date;
            $cricket->MatchNo=$request->MatchNo;
            $cricket->Round=$request->Round;
            $cricket->SportGroup=$request->SportGroup;
            $cricket->Uni1=$request->Uni1;
            $cricket->Uni1_Score=$request->Uni1_Score;
            $cricket->Uni1_Wickets=$request->Uni1_Wickets;
            $cricket->Uni1_Overs=$request->Uni1_Overs;
            $cricket->Uni2=$request->Uni2;
            $cricket->Uni2_Score=$request->Uni2_Score;
            $cricket->Uni2_Wickets=$request->Uni2_Wickets;
            $cricket->Uni2_Overs=$request->Uni2_Overs;
            $cricket->Result_Description=$request->Result_Description;

            $cricket->save();
            $data = Cricket::all();
            return view('AllSportResult.cricket')->with('tasks',$data);
        }
        else{
            return view('AllSportResult.cricket')->with('error','error insert value');
        }

    }
    public function deleteCricketResult($MatchNo){

        $task = Cricket::where('MatchNo','=',$MatchNo)->delete();
        $datas=Cricket::all();
        return view('AllSportResult.cricket')->with('tasks',$datas);

    }

    public function viewTableTennisGamesResult(){

        $data=TableTennisGames::all();
        $player=DB::table('players')
        ->where('Sport','table tennis')
        //->where('players.UniID',$request->Uni1)
        ->select('Name')
        ->orderBy('Name','asc')
        ->get();
        return view('AllSportResult.TableTennisGames',compact('player'))->with('tasks',$data);

    }


    
    


    public function saveTableTennisGamesResult(Request $request){

        $tableTennis = new TableTennisGames;
        $player=DB::table('players')
        ->where('Sport','table tennis')
        //->where('players.UniID',$request->Uni1)
        ->select('Name')
        ->orderBy('Name','asc')
        ->get();
        $this->validate($request,[
            'Gender'=>'required',
            'Round'=>'required',
            'MatchNo'=>'required|numeric',
            'MatchCategory'=>'required',
            'u1p1'=>'required',
            'uni1'=>'required',
            'points1'=>'required|numeric',
            'u2p1'=>'required',
            'uni2'=>'required',
            'points2'=>'required|numeric',
        ]);


        $tableTennis->Gender=$request->Gender;
        $tableTennis->Round=$request->Round;
        $tableTennis->MatchNo=$request->MatchNo;
        $tableTennis->MatchCategory=$request->MatchCategory;
        $tableTennis->Uni1_P1=$request->u1p1;
        $tableTennis->Uni1_P2=$request->u1p2;
        $tableTennis->Uni1=$request->uni1;
        $tableTennis->Uni1_Points=$request->points1;
        $tableTennis->Uni2_P1=$request->u2p1;
        $tableTennis->Uni2_P2=$request->u2p2;
        $tableTennis->Uni2=$request->uni2;
        $tableTennis->Uni2_Points=$request->points2;

        $tableTennis->save();

        $data = TableTennisGames::all();
        return view('AllSportResult.TableTennisGames',compact('player'))->with('tasks',$data);

    }

   
    public function deleteTableTennisGamesResult($MatchNo,$Gender,$MatchCategory){

        $task = TableTennisGames::where('MatchNo','=',$MatchNo)->where('Gender','=',$Gender)->where('MatchCategory','=',$MatchCategory)->delete();
        $datas=TableTennisGames::all();
        $player=DB::table('players')
        ->where('Sport','table tennis')
        //->where('players.UniID',$request->Uni1)
        ->select('Name')
        ->orderBy('Name','asc')
        ->get();
        return view('AllSportResult.TableTennisGames',compact('player'))->with('tasks',$datas);

    }

    public function viewTableTennisResult(){

        $data=TableTennis::all();
        return view('AllSportResult.TableTennis')->with('tasks',$data);

    }

    
    public function saveTableTennisResult(Request $request){

        $tableTennis = new TableTennis;

        $this->validate($request,[
            'Date'=>'required',
            'Gender'=>'required',
            'MatchNo'=>'required|numeric',
            'Round'=>'required',
            'SportGroup'=>'required',
            'uni1'=>'required',
            'uni1_wins'=>'required|numeric',
            'uni2'=>'required',
            'uni2_wins'=>'required|numeric',

        ]);

        $uni1=$request->uni1;
        $uni2=$request->uni2;

        if($uni1!=$uni2){
            $tableTennis->Date=$request->Date;
            $tableTennis->Gender=$request->Gender;
            $tableTennis->MatchNo=$request->MatchNo;
            $tableTennis->Round=$request->Round;
            $tableTennis->SportGroup=$request->SportGroup;
            $tableTennis->Uni1=$request->uni1;
            $tableTennis->Uni1_Wins=$request->uni1_wins;
            $tableTennis->Uni2=$request->uni2;
            $tableTennis->Uni2_Wins=$request->uni2_wins;

            if($request->uni1_wins>$request->uni2_wins)
            {
            $tableTennis->Winner=$request->uni1;
            }
            elseif($request->uni1_wins<$request->uni2_wins)
            {
            $tableTennis->Winner=$request->uni2;
            }
            else{
            $tableTennis->Winner="DRAW";  
            }
            $tableTennis->save();

            $data = TableTennis::all();
            return view('AllSportResult.TableTennis')->with('tasks',$data);
        }
        else{
            return view('AllSportResult.TableTennis')->with('error','error insert value');
        }

    }
    public function deleteTableTennisResult($MatchNo,$Gender){

        $task = TableTennis::where('MatchNo','=',$MatchNo)->where('Gender','=',$Gender)->delete();
        $datas=TableTennis::all();
        return view('AllSportResult.TableTennis')->with('tasks',$datas);

    }

    public function viewRugbyFootballResult(){
        $data=RugbyFootball::all();
        return view('AllSportResult.rugbyFootball')->with('tasks',$data);
    }


    public function saveRugbyFootballResult(Request $request){

        $rugby=new RugbyFootball;

        $this->validate($request,[
            'Date'=>'required',
            'MatchNo'=>'required|numeric',
            'Round'=>'required',
            'SportGroup'=>'required',
            'Uni1'=>'required',
            'Uni1_Score'=>'required|numeric',
            'Uni2'=>'required',
            'Uni2_Score'=>'required|numeric',
        ]);

        $uni1=$request->Uni1;
        $uni2=$request->Uni2;
        if($uni1!=$uni2){
            $rugby->Date=$request->Date;
            $rugby->MatchNo=$request->MatchNo;
            $rugby->Round=$request->Round;
            $rugby->SportGroup=$request->SportGroup;
            $rugby->Uni1=$request->Uni1;
            $rugby->Uni1_Score=$request->Uni1_Score;
            $rugby->Uni2=$request->Uni2;
            $rugby->Uni2_Score=$request->Uni2_Score;
                if($request->Uni1_Score>$request->Uni2_Score){
                $rugby->Winner=$request->Uni1;
                }
                elseif($request->Uni1_Score<$request->Uni2_Score){
                $rugby->Winner=$request->Uni2;
                }
                else{
                $rugby->Winner="DRAW";  
                }
        

            $rugby->save();
            $data = RugbyFootball::all();
            return view('AllSportResult.rugbyFootball')->with('tasks',$data);
        }
        else{
            return view('AllSportResult.rugbyFootball')->with('error','error insert value');
        }

    }
    public function deleteRugbyFootballResult($MatchNo){

        $task = RugbyFootball::where('MatchNo','=',$MatchNo)->delete();
        $datas=RugbyFootball::all();
        return view('AllSportResult.rugbyFootball')->with('tasks',$datas);

    }


    public function viewKarateKataResult(){
        $data=Karate_Kata::all();
        $player=DB::table('players')
                ->where('Sport','karate')
                //->where('players.UniID',$request->Uni1)
                ->select('Name')
                ->orderBy('Name','asc')
                ->get();
        return view('AllSportResult.Karate_Kata',compact('player'))->with('tasks',$data);
    }


    public function saveKarateKataResult(Request $request){

        $kata = new Karate_Kata;
        $player=DB::table('players')
                ->where('Sport','karate')
                //->where('players.UniID',$request->Uni1)
                ->select('Name')
                ->orderBy('Name','asc')
                ->get();
        $this->validate($request,[
            'Date'=>'required',
            'Gender'=>'required',
            'MatchNo'=>'required|numeric',
            'Team_Individual'=>'required',
            'uni'=>'required',
            'points'=>'required',
        ]);
        $kata->Date=$request->Date;
        $kata->Gender=$request->Gender;
        $kata->MatchNo=$request->MatchNo;
        $kata->Team_Individual=$request->Team_Individual;
        $kata->Uni=$request->uni;
        $kata->PlayerName=$request->PlayerName;
        $kata->PlayerName1=$request->PlayerName1;
        $kata->PlayerName2=$request->PlayerName2;
        $kata->Points=$request->points;
        $kata->save();
        
        $data = Karate_Kata::all();
        return view('AllSportResult.Karate_Kata',compact('player'))->with('tasks',$data);

    }
    public function deleteKarateKataResult($MatchNo,$Gender,$Team_Individual){

        $task = Karate_Kata::where('MatchNo','=',$MatchNo)->where('Gender','=',$Gender)->where('Team_Individual','=',$Team_Individual)->delete();
        $datas=Karate_Kata::all();
        $player=DB::table('players')
                ->where('Sport','karate')
                //->where('players.UniID',$request->Uni1)
                ->select('Name')
                ->orderBy('Name','asc')
                ->get();
        return view('AllSportResult.Karate_Kata',compact('player'))->with('tasks',$datas);

    }

    public function viewKarateKumiteResult(){
        $data=Karate_Kumite::all();
        $player=DB::table('players')
                ->where('Sport','karate')
                //->where('players.UniID',$request->Uni1)
                ->select('Name')
                ->orderBy('Name','asc')
                ->get();
        return view('AllSportResult.Karate_Kumite',compact('player'))->with('tasks',$data);
    }


    public function saveKarateKumiteResult(Request $request){

        $kumite=new Karate_Kumite;
        $player=DB::table('players')
                ->where('Sport','karate')
                //->where('players.UniID',$request->Uni1)
                ->select('Name')
                ->orderBy('Name','asc')
                ->get();
        $this->validate($request,[
            'Date'=>'required',
            //'Time'=>'required',
            'Gender'=>'required',
            'WeightCategory'=>'required',
            'MatchNo'=>'required|numeric',
            //'Round'=>'required',
            'uni1'=>'required',
            'PlayerName1'=>'required',
		'Rank'=>'required|numeric',
            //'Uni1_Score'=>'required|numeric',
            //'uni2'=>'required',
            //'PlayerName2'=>'required',
            //'Uni2_Score'=>'required|numeric',
        ]);
        $uni1 = $request->uni1;
        $uni2 = $request->uni2;
        if($uni1!=$uni2){
            $kumite->Date=$request->Date;
            $kumite->Gender=$request->Gender;
            $kumite->WeightCategory=$request->WeightCategory;
            $kumite->MatchNo=$request->MatchNo;
            $kumite->Uni=$request->uni1;
            $kumite->Uni1_Player=$request->PlayerName1;
		$kumite->Rank=$request->Rank;
            
                        $kumite->save();
            $data = Karate_Kumite::all();
            return view('AllSportResult.Karate_Kumite',compact('player'))->with('tasks',$data);
        }
        else{
            return view('AllSportResult.Karate_Kumite')->with('error','error insert value');
        }

    }
    public function deleteKarateKumiteResult($MatchNo,$Gender,$Uni1_Player){

        $task = Karate_Kumite::where('MatchNo','=',$MatchNo)->where('Gender','=',$Gender)->where('Uni1_Player','=',$Uni1_Player)->delete();
        $datas=Karate_Kumite::all();
        $player=DB::table('players')
                ->where('Sport','karate')
                //->where('players.UniID',$request->Uni1)
                ->select('Name')
                ->orderBy('Name','asc')
                ->get();
        return view('AllSportResult.Karate_Kumite',compact('player'))->with('tasks',$datas);

    }

    public function viewRunningResult(){

        $event = TrackField::Select('Event')->where('Type','Running')->distinct('Event')->get();
        $tasks = Running::all();
        $player=DB::table('players')
                ->where('Sport','track and field')
                //->where('players.UniID',$request->Uni1)
                ->select('Name')
                ->orderBy('Name','asc')
                ->get();
        return view('AllSportResult.RunningEvent',compact('event','tasks','player'));

    }

    public function saveRunningResult(Request $request){

        $run=new Running;
        $player=DB::table('players')
                ->where('Sport','track and field')
                //->where('players.UniID',$request->Uni1)
                ->select('Name')
                ->orderBy('Name','asc')
                ->get();
        $this->validate($request,[
            'Date'=>'required',
            'Time'=>'required',
            'Gender'=>'required',
            'Event'=>'required',
            'MatchNo'=>'required|numeric',
            'Round'=>'required',
            'Uni'=>'required',
            'PlayerName'=>'required',
            'FinishTime'=>'required',
            'Rank'=>'required|numeric',
        ]);
        


        $run->Date=$request->Date;
        $run->Time=$request->Time;
        $run->Gender=$request->Gender;
        $run->Event=$request->Event;
        $run->MatchNo=$request->MatchNo;
        $run->Round=$request->Round;
        $run->Uni=$request->Uni;
        $run->PlayerName=$request->PlayerName;
        $run->FinishTime=$request->FinishTime;
        $run->Rank=$request->Rank;
        
        $run->save();
        
        //$tasks = Running::all();
        $event = TrackField::Select('Event')->where('Type','Running')->distinct('Event')->get();
        $tasks = Running::all();
        return view('AllSportResult.RunningEvent',compact('event','tasks','player'));

    }
    public function deleteRunningResult($Gender,$Event,$MatchNo,$Uni,$PlayerName){

        $task = Running::where('Gender','=',$Gender)->where('Event','=',$Event)->where('MatchNo','=',$MatchNo)->where('Uni','=',$Uni)->where('PlayerName','=',$PlayerName)->delete();
        $datas=Running::all();
        $player=DB::table('players')
                ->where('Sport','track and field')
                //->where('players.UniID',$request->Uni1)
                ->select('Name')
                ->orderBy('Name','asc')
                ->get();
        $event = TrackField::Select('Event')->where('Type','Running')->distinct('Event')->get();
        return view('AllSportResult.RunningEvent',compact('event','player'))->with('tasks',$datas);

    }


    public function viewJumpingResult(){

        $event = TrackField::Select('Event')->where('Type','Jumping')->distinct('Event')->get();
        $tasks = JumpingEvent::all();
        $player=DB::table('players')
                ->where('Sport','track and field')
                //->where('players.UniID',$request->Uni1)
                ->select('Name')
                ->orderBy('Name','asc')
                ->get();
        return view('AllSportResult.JumpingEvent',compact('event','tasks','player'));

    }

    public function saveJumpingResult(Request $request){

        $jump=new JumpingEvent;
        $player=DB::table('players')
                ->where('Sport','track and field')
                //->where('players.UniID',$request->Uni1)
                ->select('Name')
                ->orderBy('Name','asc')
                ->get();
        
        $this->validate($request,[
            'Date'=>'required',
            'Time'=>'required',
            'Gender'=>'required',
            'Event'=>'required',
            'MatchNo'=>'required|numeric',
            'Round'=>'required',
            'Uni'=>'required',
            'PlayerName'=>'required',
            'Distance'=>'required',
            'Rank'=>'required|numeric',
        ]);
        


        $jump->Date=$request->Date;
        $jump->Time=$request->Time;
        $jump->Gender=$request->Gender;
        $jump->Event=$request->Event;
        $jump->MatchNo=$request->MatchNo;
        $jump->Round=$request->Round;
        $jump->Uni=$request->Uni;
        $jump->PlayerName=$request->PlayerName;
        $jump->Height_Distance=$request->Distance;
        $jump->Rank=$request->Rank;
        
        $jump->save();
        $event = TrackField::Select('Event')->where('Type','Jumping')->distinct('Event')->get();
        $tasks = JumpingEvent::all();
        
        //$tasks = Running::all();
        return view('AllSportResult.JumpingEvent',compact('event','tasks','player'));

    }
    public function deleteJumpingResult($Gender,$Event,$MatchNo,$Uni,$PlayerName){

        $task = JumpingEvent::where('Gender','=',$Gender)->where('Event','=',$Event)->where('MatchNo','=',$MatchNo)->where('Uni','=',$Uni)->where('PlayerName','=',$PlayerName)->delete();
        $datas=JumpingEvent::all();
        $player=DB::table('players')
                ->where('Sport','track and field')
                //->where('players.UniID',$request->Uni1)
                ->select('Name')
                ->orderBy('Name','asc')
                ->get();
        $event = TrackField::Select('Event')->where('Type','Jumping')->distinct('Event')->get();
        return view('AllSportResult.JumpingEvent',compact('event','player'))->with('tasks',$datas);

    }




    public function viewThrowingResult(){

        $event = TrackField::Select('Event')->where('Type','Throwing')->distinct('Event')->get();
        $tasks = ThrowingEvent::all();
        $player=DB::table('players')
                ->where('Sport','track and field')
                //->where('players.UniID',$request->Uni1)
                ->select('Name')
                ->orderBy('Name','asc')
                ->get();
        return view('AllSportResult.ThrowingEvent',compact('event','tasks','player'));

    }



    public function saveThrowingResult(Request $request){

        $throwing=new ThrowingEvent;
        $player=DB::table('players')
                ->where('Sport','track and field')
                //->where('players.UniID',$request->Uni1)
                ->select('Name')
                ->orderBy('Name','asc')
                ->get();
        $this->validate($request,[
            'Date'=>'required',
            'Time'=>'required',
            'Gender'=>'required',
            'Event'=>'required',
            'MatchNo'=>'required|numeric',
            'Round'=>'required',
            'Uni'=>'required',
            'PlayerName'=>'required',
            'Distance'=>'required',
            'Rank'=>'required|numeric',
        ]);
        


        $throwing->Date=$request->Date;
        $throwing->Time=$request->Time;
        $throwing->Gender=$request->Gender;
        $throwing->Event=$request->Event;
        $throwing->MatchNo=$request->MatchNo;
        $throwing->Round=$request->Round;
        $throwing->Uni=$request->Uni;
        $throwing->PlayerName=$request->PlayerName;
        $throwing->Distance=$request->Distance;
        $throwing->Rank=$request->Rank;
        
        $throwing->save();
        $event = TrackField::Select('Event')->where('Type','Throwing')->distinct('Event')->get();
        $tasks = ThrowingEvent::all();
        //$tasks = Running::all();
        return view('AllSportResult.ThrowingEvent',compact('event','tasks','player'));

    }
    public function deleteThrowingResult($Gender,$Event,$MatchNo,$Uni,$PlayerName){

        $task = ThrowingEvent::where('Gender','=',$Gender)->where('Event','=',$Event)->where('MatchNo','=',$MatchNo)->where('Uni','=',$Uni)->where('PlayerName','=',$PlayerName)->delete();
        $datas=ThrowingEvent::all();
        $player=DB::table('players')
                ->where('Sport','track and field')
                //->where('players.UniID',$request->Uni1)
                ->select('Name')
                ->orderBy('Name','asc')
                ->get();
        $event = TrackField::Select('Event')->where('Type','Throwing')->distinct('Event')->get();
        return view('AllSportResult.ThrowingEvent',compact('event','player'))->with('tasks',$datas);

    }


    public function viewCarromResult(){
        $data=Carrom::all();
        return view('AllSportResult.carrom')->with('tasks',$data);
    }


    public function saveCarromResult(Request $request){

        $carrom = new Carrom;

        $this->validate($request,[
            'Date'=>'required',
            'Gender'=>'required',
            'MatchNo'=>'required|numeric',
            'Round'=>'required',
            'uni1'=>'required',
            'uni1_wins'=>'required|numeric|max:5',
            'uni2'=>'required',
            'uni2_wins'=>'required|numeric|max:5',
            
        ]);
        
       
        $x=$request->uni1_wins;
        $y=$request->uni2_wins;
        $uni1 = $request->uni1;
        $uni2 = $request->uni2;

        if($uni1!=$uni2){
            $carrom->Date=$request->Date;
            $carrom->Gender=$request->Gender;
            $carrom->MatchNo=$request->MatchNo;
            $carrom->Round=$request->Round;
            $carrom->SportGroup=$request->SportGroup;
            $carrom->Uni1=$request->uni1;
            $carrom->Uni1_Wins=$request->uni1_wins;
            $carrom->Uni2=$request->uni2;
            $carrom->Uni2_Wins=$request->uni2_wins;
            if($x>$y){
                $carrom->Winner=$request->uni1;
            }
            else if($x<$y){
                $carrom->Winner=$request->uni2;
            }
            else{
                $carrom->Winner="DRAW";
            }

                $carrom->save();                
                $data = Carrom::all();
                return view('AllSportResult.carrom')->with('tasks',$data);
        }
        else{
                return view('AllSportResult.carrom')->with('error','!error insert value');
        }

    }
    public function deleteCarromResult($MatchNo,$Gender){

        $task = Carrom::where('MatchNo','=',$MatchNo)->where('Gender','=',$Gender)->delete();
        $datas=Carrom::all();
        return view('AllSportResult.carrom')->with('tasks',$datas);

    }



    
    public function viewTennisResult(){
        $data=Tennis::all();
        return view('AllSportResult.tennis')->with('tasks',$data);
    }


    public function saveTennisResult(Request $request){

        $tennis = new Tennis;

        $this->validate($request,[
            'Date'=>'required',
            'Gender'=>'required',
            'MatchNo'=>'required|numeric',
            'Round'=>'required',
            'SportGroup'=>'required',
            'uni1'=>'required',
            'uni1_wins'=>'required|numeric|max:3',
            'uni2'=>'required',
            'uni2_wins'=>'required|numeric|max:3',
            
        ]);
        
       
        $x=$request->uni1_wins;
        $y=$request->uni2_wins;
        $uni1 = $request->uni1;
        $uni2 = $request->uni2;

        if($uni1!=$uni2){
            $tennis->Date=$request->Date;
            $tennis->Gender=$request->Gender;
            $tennis->MatchNo=$request->MatchNo;
            $tennis->Round=$request->Round;
            $tennis->SportGroup=$request->SportGroup;
            $tennis->Uni1=$request->uni1;
            $tennis->Uni1_Wins=$request->uni1_wins;
            $tennis->Uni2=$request->uni2;
            $tennis->Uni2_Wins=$request->uni2_wins;
            if($x>$y){
                $tennis->Winner=$request->uni1;
            }
            else if($x<$y){
                $tennis->Winner=$request->uni2;
            }
            else{
                $tennis->Winner="DRAW";
            }

                $tennis->save();                
                $data = Tennis::all();
                return view('AllSportResult.tennis')->with('tasks',$data);
        }
        else{
                return view('AllSportResult.tennis')->with('error','!error insert value');
        }

    }
    public function deleteTennisResult($MatchNo,$Gender){

        $task = Tennis::where('MatchNo','=',$MatchNo)->where('Gender','=',$Gender)->delete();
        $datas=Tennis::all();
        return view('AllSportResult.tennis')->with('tasks',$datas);

    }



    public function viewSwimmingResult(){
        $data=Swimming::all();
        $player=DB::table('players')
        ->where('Sport','swimming')
        //->where('players.UniID',$request->Uni1)
        ->select('Name')
        ->orderBy('Name','asc')
        ->get();
        return view('AllSportResult.swimming',compact('player'))->with('tasks',$data);
    }


    public function saveSwimmingResult(Request $request){

        $swimming = new Swimming;

        $this->validate($request,[
            'Date'=>'required',
            'Gender'=>'required',
            'MatchNo'=>'required|numeric',
            'Event'=>'required',
            'Round'=>'required',
            'Uni'=>'required',
            'PlayerName'=>'required',
            'FinishTime'=>'required',
            'Rank'=>'required',
            
        ]);
        $player=DB::table('players')
        ->where('Sport','swimming')
        //->where('players.UniID',$request->Uni1)
        ->select('Name')
        ->orderBy('Name','asc')
        ->get();
        
    
            $swimming->Date=$request->Date;
            $swimming->Gender=$request->Gender;
            $swimming->MatchNo=$request->MatchNo;
            $swimming->Event=$request->Event;
            $swimming->Round=$request->Round;
            $swimming->Uni=$request->Uni;
            $swimming->PlayerName=$request->PlayerName;
            $swimming->FinishTime=$request->FinishTime;
            $swimming->Rank=$request->Rank;
    

                $swimming->save();                
                $data = swimming::all();
                return view('AllSportResult.swimming',compact('player'))->with('tasks',$data);
      

    }
    public function deleteSwimmingResult($MatchNo,$Event,$Round,$Uni,$PlayerName){

        $task = Swimming::where('MatchNo','=',$MatchNo)->where('Event','=',$Event)->where('Round','=',$Round)->where('Uni','=',$Uni)->where('PlayerName','=',$PlayerName)->delete();
        $datas=Swimming::all();
        $player=DB::table('players')
        ->where('Sport','swimming')
        //->where('players.UniID',$request->Uni1)
        ->select('Name')
        ->orderBy('Name','asc')
        ->get();
        return view('AllSportResult.swimming',compact('player'))->with('tasks',$datas);

    }


    public function viewSwimmingTeamResult(){
        $data=SwimmingTeam::all();
        return view('AllSportResult.swimmingTeam')->with('tasks',$data);
    }


    public function saveSwimmingTeamResult(Request $request){

        $swimming = new SwimmingTeam;

        $this->validate($request,[
            'Date'=>'required',
            'Gender'=>'required',
            'MatchNo'=>'required|numeric',
            'Event'=>'required',
            'Round'=>'required',
            'Uni'=>'required',
            'FinishTime'=>'required',
            'Rank'=>'required',
            
        ]);
        
    
            $swimming->Date=$request->Date;
            $swimming->Gender=$request->Gender;
            $swimming->MatchNo=$request->MatchNo;
            $swimming->Event=$request->Event;
            $swimming->Round=$request->Round;
            $swimming->Uni=$request->Uni;
            $swimming->FinishTime=$request->FinishTime;
            $swimming->Rank=$request->Rank;
    

                $swimming->save();                
                $data = SwimmingTeam::all();
                return view('AllSportResult.swimmingTeam')->with('tasks',$data);
      

    }
    public function deleteSwimmingTeamResult($MatchNo,$Event,$Round,$Uni){

        $task = SwimmingTeam::where('MatchNo','=',$MatchNo)->where('Event','=',$Event)->where('Round','=',$Round)->where('Uni','=',$Uni)->delete();
        $datas=SwimmingTeam::all();
        return view('AllSportResult.swimmingTeam')->with('tasks',$datas);

    }

public function viewTaekwondoResult(){

        $uniIDarray=DB::table('unis')->select('UniID')->get()->toArray();
        $player=DB::table('players')->select('Name')->where('Gender','m')->where('Sport','taekwondo')->get()->toArray();
        $playerw=DB::table('players')->select('Name')->where('Gender','f')->where('Sport','taekwondo')->get()->toArray();
        $playermw=DB::table('players')->select('Name')->where('Sport','taekwondo')->get()->toArray();

        $tasks=DB::table('taekwondo_sparring')->get()->toArray();
        $taskss=DB::table('taekwondo_individual_poomsae')->get()->toArray();
        $tasksss=DB::table('taekwondo_team_poomsae')->get()->toArray();
        return view ('AllSportResult.taekwon',compact('uniIDarray','player','playerw','playermw','tasks','taskss','tasksss'));
    }

    public function saveMensSparringResult(Request $request){

        $taek = new TaekwondoSparring;

        $this->validate($request,[
            'Date'=>'required',
            'Time'=>'required',
            'MatchNo'=>'required|numeric',
            'Round'=>'required',
            'WeightCategory'=>'required',
            'Uni1'=>'required',
            'Uni1_Player'=>'required',
            'Uni2'=>'required',
            'Uni2_Player'=>'required',
            'Winner'=>'required'
        ]);

        $taek->Date=$request->Date;
        $taek->Time=$request->Time;
        $taek->WeightCategory=$request->WeightCategory;
        $taek->MatchNo=$request->MatchNo;
        $taek->Round=$request->Round;
        $taek->Gender='M';


        $taek->Uni1=$request->Uni1;
        $taek->Uni1_Player=$request->Uni1_Player;
        $taek->Uni1_Score=$request->Uni1_Score;

        $taek->Uni2=$request->Uni2;
        $taek->Uni2_Player=$request->Uni2_Player;
        $taek->Uni2_Score=$request->Uni2_Score;

        $taek->Winner=$request->Winner;

        $taek->save();

        $uniIDarray=DB::table('unis')->select('UniID')->get()->toArray();
        $player=DB::table('players')->select('Name')->where('Gender','m')->where('Sport','taekwondo')->get()->toArray();
        $playerw=DB::table('players')->select('Name')->where('Gender','f')->where('Sport','taekwondo')->get()->toArray();
        $playermw=DB::table('players')->select('Name')->where('Sport','taekwondo')->get()->toArray();

        $tasks=DB::table('taekwondo_sparring')->get()->toArray();
        $taskss=DB::table('taekwondo_individual_poomsae')->get()->toArray();
        $tasksss=DB::table('taekwondo_team_poomsae')->get()->toArray();
        return view ('AllSportResult.taekwon',compact('uniIDarray','player','playerw','playermw','tasks','taskss','tasksss'));


    }

    public function saveWomensSparringResult(Request $request){

        $taek = new TaekwondoSparring;

        $this->validate($request,[
            'Date'=>'required',
            'Time'=>'required',
            'MatchNo'=>'required|numeric',
            'Round'=>'required',
            'WeightCategory'=>'required',
            'Uni1'=>'required',
            'Uni1_Player'=>'required',
            'Uni2'=>'required',
            'Uni2_Player'=>'required',
            'Winner'=>'required'
        ]);

        $taek->Date=$request->Date;
        $taek->Time=$request->Time;
        $taek->WeightCategory=$request->WeightCategory;
        $taek->MatchNo=$request->MatchNo;
        $taek->Round=$request->Round;
        $taek->Gender='M';


        $taek->Uni1=$request->Uni1;
        $taek->Uni1_Player=$request->Uni1_Player;
        $taek->Uni1_Score=$request->Uni1_Score;

        $taek->Uni2=$request->Uni2;
        $taek->Uni2_Player=$request->Uni2_Player;
        $taek->Uni2_Score=$request->Uni2_Score;

        $taek->Winner=$request->Winner;

        $taek->save();

        $uniIDarray=DB::table('unis')->select('UniID')->get()->toArray();
        $player=DB::table('players')->select('Name')->where('Gender','m')->where('Sport','taekwondo')->get()->toArray();
        $playerw=DB::table('players')->select('Name')->where('Gender','f')->where('Sport','taekwondo')->get()->toArray();
        $playermw=DB::table('players')->select('Name')->where('Sport','taekwondo')->get()->toArray();

        $tasks=DB::table('taekwondo_sparring')->get()->toArray();
        $taskss=DB::table('taekwondo_individual_poomsae')->get()->toArray();
        $tasksss=DB::table('taekwondo_team_poomsae')->get()->toArray();
        return view ('AllSportResult.taekwon',compact('uniIDarray','player','playerw','playermw','tasks','taskss','tasksss'));


    }

    public function savePoomsaeIndividualResult(Request $request){
        $taek = new IndividualPoomsae;

        $this->validate($request,[
            'Date'=>'required',
            'Time'=>'required',
            'Gender'=>'required',
            'MatchNo'=>'required|numeric',
            'Round'=>'required',
            'Uni'=>'required',
            'Player'=>'required',
            'Score'=>'required',
            'Rank'=>'required'
        ]);

        $taek->Date=$request->Date;
        $taek->Time=$request->Time;
        $taek->Gender=$request->Gender;
        $taek->MatchNo=$request->MatchNo;
        $taek->Round=$request->Round;
        $taek->Uni=$request->Uni;
        $taek->PlayerName=$request->Player;
        $taek->Points=$request->Score;
        $taek->Rank=$request->Rank;

        $taek->save();

        $uniIDarray=DB::table('unis')->select('UniID')->get()->toArray();
        $player=DB::table('players')->select('Name')->where('Gender','m')->where('Sport','taekwondo')->get()->toArray();
        $playerw=DB::table('players')->select('Name')->where('Gender','f')->where('Sport','taekwondo')->get()->toArray();
        $playermw=DB::table('players')->select('Name')->where('Sport','taekwondo')->get()->toArray();

        $tasks=DB::table('taekwondo_sparring')->get()->toArray();
        $taskss=DB::table('taekwondo_individual_poomsae')->get()->toArray();
        $tasksss=DB::table('taekwondo_team_poomsae')->get()->toArray();
        return view ('AllSportResult.taekwon',compact('uniIDarray','player','playerw','playermw','tasks','taskss','tasksss'));

    }

    public function savePoomsaeTeamResult(Request $request){
        $taek = new TeamPoomsae;

        $this->validate($request,[
            'Date'=>'required',
            'Time'=>'required',
            'Gender'=>'required',
            //'MatchNo'=>'required|numeric',
            //'Round'=>'required',
            'Uni'=>'required',
            'Score'=>'required',
            'Rank'=>'required'
        ]);

        $taek->Date=$request->Date;
        $taek->Time=$request->Time;
        $taek->Gender=$request->Gender;
        $taek->MatchNo=$request->MatchNo;
        $taek->Round=$request->Round;
        $taek->Uni=$request->Uni;
        $taek->Points=$request->Score;
        $taek->Rank=$request->Rank;

        $taek->save();

        $uniIDarray=DB::table('unis')->select('UniID')->get()->toArray();
        $player=DB::table('players')->select('Name')->where('Gender','m')->where('Sport','taekwondo')->get()->toArray();
        $playerw=DB::table('players')->select('Name')->where('Gender','f')->where('Sport','taekwondo')->get()->toArray();
        $playermw=DB::table('players')->select('Name')->where('Sport','taekwondo')->get()->toArray();

        $tasks=DB::table('taekwondo_sparring')->get()->toArray();
        $taskss=DB::table('taekwondo_individual_poomsae')->get()->toArray();
        $tasksss=DB::table('taekwondo_team_poomsae')->get()->toArray();
        return view ('AllSportResult.taekwon',compact('uniIDarray','player','playerw','playermw','tasks','taskss','tasksss'));

    }

       public function deleteTeaekwondoSparringResult($MatchNo,$Uni1_Player,$Uni2_Player,$Gender){
        $task = TaekwondoSparring::where('MatchNo','=',$MatchNo)->where('Uni1_Player','=',$Uni1_Player)->where('Uni2_Player','=',$Uni2_Player)->where('Gender','=',$Gender)->delete();

        /*$player=DB::table('player__sports')
            ->join('players','player__sports.PlayerID','=','players.PlayerID')
            ->where('player__sports.Sport','Taekwondo')
            //->where('players.UniID',$request->Uni1)
            ->select('Players.Name')
            ->get();
        */
        $data = TaekwondoSparring::all();
        $uniIDarray=DB::table('unis')->select('UniID')->get()->toArray();
        $player=DB::table('players')->select('Name')->where('Gender','m')->where('Sport','taekwondo')->get()->toArray();
        $playerw=DB::table('players')->select('Name')->where('Gender','f')->where('Sport','taekwondo')->get()->toArray();
        $playermw=DB::table('players')->select('Name')->where('Sport','taekwondo')->get()->toArray();

        $tasks=DB::table('taekwondo_sparring')->get()->toArray();
        $taskss=DB::table('taekwondo_individual_poomsae')->get()->toArray();
        $tasksss=DB::table('taekwondo_team_poomsae')->get()->toArray();
        return view ('AllSportResult.taekwon',compact('uniIDarray','player','playerw','playermw','tasks','taskss','tasksss'));
    }

    public function deletePoomsaeIndividualResult($MatchNo,$PlayerName,$Gender){
        $task = IndividualPoomsae::where('MatchNo','=',$MatchNo)->where('PlayerName','=',$PlayerName)->where('Gender','=',$Gender)->delete();

        /*$player=DB::table('player__sports')
            ->join('players','player__sports.PlayerID','=','players.PlayerID')
            ->where('player__sports.Sport','Taekwondo')
            //->where('players.UniID',$request->Uni1)
            ->select('Players.Name')
            ->get();
        */
        //$data = TaekwondoSparring::all();
        $uniIDarray=DB::table('unis')->select('UniID')->get()->toArray();
        $player=DB::table('players')->select('Name')->where('Gender','m')->where('Sport','taekwondo')->get()->toArray();
        $playerw=DB::table('players')->select('Name')->where('Gender','f')->where('Sport','taekwondo')->get()->toArray();
        $playermw=DB::table('players')->select('Name')->where('Sport','taekwondo')->get()->toArray();

        $tasks=DB::table('taekwondo_sparring')->get()->toArray();
        $taskss=DB::table('taekwondo_individual_poomsae')->get()->toArray();
        $tasksss=DB::table('taekwondo_team_poomsae')->get()->toArray();
        return view ('AllSportResult.taekwon',compact('uniIDarray','player','playerw','playermw','tasks','taskss','tasksss'));
    }

    public function deletePoomsaeTeamResult($MatchNo,$Uni,$Gender){
        $task = TeamPoomsae::where('MatchNo','=',$MatchNo)->where('Uni','=',$Uni)->where('Gender','=',$Gender)->delete();

        /*$player=DB::table('player__sports')
            ->join('players','player__sports.PlayerID','=','players.PlayerID')
            ->where('player__sports.Sport','Taekwondo')
            //->where('players.UniID',$request->Uni1)
            ->select('Players.Name')
            ->get();
        */
        //$data = TaekwondoSparring::all();
        $uniIDarray=DB::table('unis')->select('UniID')->get()->toArray();
        $player=DB::table('players')->select('Name')->where('Gender','m')->where('Sport','taekwondo')->get()->toArray();
        $playerw=DB::table('players')->select('Name')->where('Gender','f')->where('Sport','taekwondo')->get()->toArray();
        $playermw=DB::table('players')->select('Name')->where('Sport','taekwondo')->get()->toArray();

        $tasks=DB::table('taekwondo_sparring')->get()->toArray();
        $taskss=DB::table('taekwondo_individual_poomsae')->get()->toArray();
        $tasksss=DB::table('taekwondo_team_poomsae')->get()->toArray();
        return view ('AllSportResult.taekwon',compact('uniIDarray','player','playerw','playermw','tasks','taskss','tasksss'));
    }

public function AddOngoingGames(){
        $uniIDarray=DB::table('unis')->select('UniID')->get()->toArray();
        $tasks=DB::table('ongoinggames')->where('Ongoing','T')->get()->toArray();
        return view('AllSportResult.OnGoing2',compact('uniIDarray','tasks'));
    }

    public function SaveOngoingGames(Request $request){
        //$ong = new ongoing;

        $this->validate($request,[
            'Gender'=>'required',
            'MatchNo'=>'required|numeric',
            'Round'=>'required',
            'Uni1'=>'required',
            'Uni2'=>'required',
        ]);

        /*
        $ong->Sport=$request->Sport;
        $ong->Gender=$request->Gender;
        $ong->MatchNo=$request->MatchNo;
        $ong->Round=$request->Round;
        $ong->Uni1=$request->uni1;
        $ong->Uni1_Score=$request->Uni1_score;
        $ong->Uni2=$request->uni2;
        $ong->Uni2_Score=$request->uni2_score;
        $ong->Ongoing=$request->ongoing;
        //$ong->save();
        */
        $a=1;
        DB::table('ongoinggames')->insert(array(
            'Sport' => $request->Sport, 'Gender' => $request->Gender,
                'MatchNo'=>$request->MatchNo,'Round'=>$request->Round,
                'Uni1'=>$request->Uni1,'Uni1_Score'=>$request->Uni1_Score,
                'Uni2'=>$request->Uni2,'Uni2_Score'=>$request->Uni2_Score,
                'Ongoing'=>'T'
        ));
       // echo $request->Sport;
        $uniIDarray=DB::table('unis')->select('UniID')->get()->toArray();
        $tasks=DB::table('ongoinggames')->where('Ongoing','T')->get()->toArray();
        return view('AllSportResult.OnGoing2',compact('uniIDarray','tasks'));
    }

    public function updateResult(Request $request)
    {
        DB::table('ongoinggames')
            ->where('GameID', $request->id)
            ->update(array('Uni1_Score' => $request->score1,'Uni2_Score' => $request->score2,'Ongoing'=>$request->ong));

        $uniIDarray=DB::table('unis')->select('UniID')->get()->toArray();
        $tasks=DB::table('ongoinggames')->where('Ongoing','T')->get()->toArray();
        return view('AllSportResult.OnGoing2',compact('uniIDarray','tasks'));
    }







}
