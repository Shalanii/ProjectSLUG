<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Sports_Teams;
use PDF;
use App\Badminton;
use App\TrackField;
use App\Weightlifting;
use App\badmintonGames;
use App\TableTennisGames;
class ResultController extends Controller
{
    //
    public function Select(){
        $d = DB::table('sports__teams')->select('Sport')->distinct()->get(array('sports__teams.Sport '))->toArray();
        return view('SportResultView.ResultByGames',compact('d'));
    }

    public function BadmintonView(Request $request)
    {
        $matchno=$request->hidden;
        $dd = DB::table('badminton_games')->where('MatchNo',$matchno)->first();
        $d = DB::table('badminton_games')->where('MatchNo',$matchno)->orderByRaw( "FIELD(MatchCategory, '1st Single', '2nd Single', '3rd Single', '1st Double', '2nd Double')" )->get()->toArray();
        //ORDER BY FIELD(id,3,2,1,4);
        //print_r($d);
        echo '<br><br>';
        return view('AdminResultView.BadmintonGames',compact('d','dd'));
    }

    public function TableTennisView(Request $request)
    {
        $matchno=$request->hidden;
        $dd = DB::table('table_tennis_games')->where('MatchNo',$matchno)->first();
        $d = DB::table('table_tennis_games')->where('MatchNo',$matchno)->orderByRaw( "FIELD(MatchCategory, '1st Single', '2nd Single', '3rd Single', '1st Double', '2nd Double')" )->get()->toArray();
        //ORDER BY FIELD(id,3,2,1,4);
       // print_r($d);
        echo '<br><br>';
        return view('AdminResultView.TableTennisGames',compact('d','dd'));
    }

    public function downloadPDF2(Request $request){
        $ev=DB::table('TrackAndField')->select('Event')->distinct()->get(array('TrackAndField.Event'))->toArray();
       // print_r($ev);
        $r1=DB::table('RunningEvents')->get()->toArray();
        $r2=DB::table('ThrowingEvents')->get()->toArray();
        $r3=DB::table('JumpingEvents')->get()->toArray();

        $view=$request->hidden;

        $pdf=PDF::loadView($view,compact('r1','r2','r3','ev'));
        $name=$view.'Results';
        return $pdf->download($name.'.pdf');
    }


    public function ViewTrackAndFieldResults(Request $request){
        $event=$request->event;
        $ty=DB::table('TrackAndField')->select('Type')->distinct()->where('Event',$event)->pluck('Type');
        //$ne= json_decode($ty, true);
        //print_r($ne);
        $type=trim($ty,'"]["');
        $tb=$type.'Events';
        $r=$ty=DB::table($tb)->where('Event',$event)->get()->toArray();
        //print_r($r);
        if($type=='Running')
            return view('AdminResultView.RunningView',compact('r'));
        elseif ($type=='Throwing')
            return view('AdminResultView.ThrowingView',compact('r'));
        else
            return view('AdminResultView.JumpingView',compact('r'));
    }


    public function downloadPDF(Request $request){
        $view=$request->hidden;
        $tableName=substr($view,16);
        $r = DB::table($tableName)->get()->toArray();
        $pdf=PDF::loadView($view,compact('r'));
        $name=$view.'Results';
        return $pdf->download($name.'.pdf');
    }

    public function View(Request $request){
        $sport=$request->sport;

       
        if($sport=='Table Tennis') {
            $r1 = DB::table('table_tennis')->get()->toArray();
            return view('AdminResultView.Table_Tennis',compact('r1'));
        }
        else if($sport=='Road Race'){
            $r = DB::table('roadrace')->orderBy('Rank')->get()->toArray();
            return view('AdminResultView.RoadRace',compact('r'));
        }
        else if($sport=='Karate'){
            $r1 = DB::table('karate_kata')->get();
            $r2 = DB::table('karate_kumite')->get();
            return view('AdminResultView.Karate',compact('r1','r2'));
        }
        else if($sport=='Weight Lifting'){
            $r = DB::table('weightlifting')->get();
            return view('AdminResultView.WeightLifting',compact('r'));
        }
        else if($sport=='Netball'){
            $r = DB::table('netball')->get();
            return view('AdminResultView.Netball',compact('r'));
        }
        else if($sport=='Elle'){
            $r = DB::table('elle')->get();
            return view('AdminResultView.Elle',compact('r'));
        }
        else if($sport=='Badminton'){
            $r = Badminton::orderBy('MatchNo','desc')->get();
            $r1=DB::table('unis')->select('UniName')->get();
            return view('AdminResultView.Badminton',compact('r','r1'));
        }
        else if($sport=='Rugby Football'){
            $r = DB::table('rugbyfootball')->get()->toArray();
            return view('AdminResultView.RugbyFootball',compact('r'));
        }
        else if($sport=='Track and Field'){
            $ev=DB::table('TrackAndField')->select('Event')->distinct()->get(array('TrackAndField.Event'))->toArray();
            $r1=DB::table('RunningEvents')->get()->toArray();
            $r2=DB::table('ThrowingEvents')->get()->toArray();
            $r3=DB::table('JumpingEvents')->get()->toArray();
            return view('AdminResultView.TrackAndField',compact('r1','r2','r3','ev'));
        }
        else if($sport=='Football'){
            $r = DB::table($sport)->get()->toArray();
            return view('AdminResultView.Football',compact('r'));
            
        }
        else if($sport=='Rowing'){
            $r = DB::table($sport)->get()->toArray();
            return view('AdminResultView.Rowing',compact('r'));
            
        }
        else if($sport=='Hockey'){
             $r = DB::table($sport)->get()->toArray();
             return view('AdminResultView.Hockey',compact('r'));
        }
        else if($sport=='Cricket'){
            $r = DB::table($sport)->get()->toArray();
            //$r1 = DB::table($sport)->get()->toArray();
            return view('AdminResultView.Cricket',compact('r'));
       }
        else if($sport=='Baseball'){
            $r = DB::table($sport)->get()->toArray();
            return view('AdminResultView.Baseball',compact('r'));
       }
       else if($sport=='Basketball'){
        $r = DB::table($sport)->get()->toArray();
        return view('AdminResultView.Basketball',compact('r'));
   }
        else {
            $r = DB::table($sport)->get()->toArray();
            return view('AdminResultView'.$sport,compact('r'));
        }
    }



    //User View Result
    public function basketball(){
        $r = DB::table('basketball')
	        ->join('unis as a','basketball.Uni1','=','a.UniID')
            ->join('unis as b','basketball.Uni2','=','b.UniID1')
            //->where('a.UniID','table_tennis.Uni1')
            //->where('b.UniID1','table_tennis.Uni2')
            ->select('a.UniName','a.Image','a.UniID','b.UniName1','b.Image1','b.UniID1','basketball.*')
            ->orderBy('basketball.MatchNo','desc')
            ->get();
        if(count($r)>0){
            return view('SportResultView.Basketball',compact('r'));
        }
        else{
            return view('SportResultView.Basketball')->with('message','No Data Found');
        }
    }
    public function netball(){
        $r = DB::table('netball')
	        ->join('unis as a','netball.Uni1','=','a.UniID')
            ->join('unis as b','netball.Uni2','=','b.UniID1')
            //->where('a.UniID','table_tennis.Uni1')
            //->where('b.UniID1','table_tennis.Uni2')
            ->select('a.UniName','a.Image','a.UniID','b.UniName1','b.Image1','b.UniID1','netball.*')
            ->orderBy('netball.MatchNo','desc')
            ->get();
        if(count($r)>0){
            return view('SportResultView.Netball',compact('r'));
        }
        else{
            return view('SportResultView.Netball')->with('message','No Data Found');
        }
    }
    public function hockey(){
        $r = DB::table('hockey')
	        ->join('unis as a','hockey.Uni1','=','a.UniID')
            ->join('unis as b','hockey.Uni2','=','b.UniID1')
            //->where('a.UniID','table_tennis.Uni1')
            //->where('b.UniID1','table_tennis.Uni2')
            ->select('a.UniName','a.Image','a.UniID','b.UniName1','b.Image1','b.UniID1','hockey.*')
            ->orderBy('hockey.MatchNo','desc')
            ->get();
        if(count($r)>0){
            return view('SportResultView.Hockey',compact('r'));
        }
        else{
            return view('SportResultView.Hockey')->with('message','No Data Found');
        }
    }
    public function baseball(){
        $r = DB::table('baseball')
	        ->join('unis as a','baseball.Uni1','=','a.UniID')
            ->join('unis as b','baseball.Uni2','=','b.UniID1')
            //->where('a.UniID','table_tennis.Uni1')
            //->where('b.UniID1','table_tennis.Uni2')
            ->select('a.UniName','a.Image','a.UniID','b.UniName1','b.Image1','b.UniID1','baseball.*')
            ->orderBy('baseball.MatchNo','desc')
            ->get();
        if(count($r)>0){
            return view('SportResultView.Baseball',compact('r'));
        }
        else{
            return view('SportResultView.Baseball')->with('message','No Data Found');
        }
    }
    public function cricket(){
        $r = DB::table('cricket')
	        ->join('unis as a','cricket.Uni1','=','a.UniID')
            ->join('unis as b','cricket.Uni2','=','b.UniID1')
            //->where('a.UniID','table_tennis.Uni1')
            //->where('b.UniID1','table_tennis.Uni2')
            ->select('a.UniName','a.Image','a.UniID','b.UniName1','b.Image1','b.UniID1','cricket.*')
            ->orderBy('cricket.MatchNo','desc')
            ->get();
            if(count($r)>0){
                 return view('SportResultView.Cricket',compact('r'));
            }
            else{
                return view('SportResultView.Cricket')->with('message','No Data Found');
            }
    }
    public function football(){
        $r = DB::table('football')
	        ->join('unis as a','football.Uni1','=','a.UniID')
            ->join('unis as b','football.Uni2','=','b.UniID1')
            //->where('a.UniID','table_tennis.Uni1')
            //->where('b.UniID1','table_tennis.Uni2')
            ->select('a.UniName','a.Image','a.UniID','b.UniName1','b.Image1','b.UniID1','football.*')
            ->orderBy('football.MatchNo','desc')
            ->get();
            if(count($r)>0){
                return view('SportResultView.Football',compact('r'));
            }
            else{
                return view('SportResultView.Football')->with('message','No Data Found');
            }
    }
    public function rugby(){
        $r = DB::table('rugbyfootball')
	        ->join('unis as a','rugbyfootball.Uni1','=','a.UniID')
            ->join('unis as b','rugbyfootball.Uni2','=','b.UniID1')
            //->where('a.UniID','table_tennis.Uni1')
            //->where('b.UniID1','table_tennis.Uni2')
            ->select('a.UniName','a.Image','a.UniID','b.UniName1','b.Image1','b.UniID1','rugbyfootball.*')
            ->orderBy('rugbyfootball.MatchNo','desc')
            ->get();
        if(count($r)>0){
            return view('SportResultView.RugbyFootball',compact('r'));
        }
        else{
            return view('SportResultView.RugbyFootball')->with('message','No Data Found');
        }
    }
    public function volleyball(){
        $r = DB::table('volleyball')
	        ->join('unis as a','volleyball.Uni1','=','a.UniID')
            ->join('unis as b','volleyball.Uni2','=','b.UniID1')
            //->where('a.UniID','table_tennis.Uni1')
            //->where('b.UniID1','table_tennis.Uni2')
            ->select('a.UniName','a.Image','a.UniID','b.UniName1','b.Image1','b.UniID1','volleyball.*')
            ->orderBy('volleyball.Date','desc')
	    ->orderBy('volleyball.Round','desc')
	    ->orderBy('volleyball.Gender','asc')
            ->get();
            if(count($r)>0){
                    return view('SportResultView.Volleyball',compact('r'));
            }
            else{
                return view('SportResultView.Volleyball')->with('message','No Data Found');
            }
    }


	public function VoolleyballGamesResult($MatchNo){

        $r=DB::table('Volleyball_Games')
            ->join('unis as a','Volleyball_Games.Uni1','=','a.UniID')
            ->join('unis as b','Volleyball_Games.Uni2','=','b.UniID1')
            ->where('MatchNo','=',$MatchNo)
            ->select('a.UniName','a.Image','a.UniID','b.UniName1','b.Image1','b.UniID1','Volleyball_Games.*')
            ->get();

        if(count($r)>0){
           
            return view('SportResultView.VolleyballGames',compact('r'));
        }
        else{
            return view('SportResultView.VolleyballGames')->with('message','No Data Found');
        }

    }
	



    public function tabletennis(){
        $r = DB::table('table_tennis')
	        ->join('unis as a','table_tennis.Uni1','=','a.UniID')
            ->join('unis as b','table_tennis.Uni2','=','b.UniID1')
            //->where('a.UniID','table_tennis.Uni1')
            //->where('b.UniID1','table_tennis.Uni2')
            ->select('a.UniName','a.Image','a.UniID','b.UniName1','b.Image1','b.UniID1','table_tennis.*')
            ->orderBy('table_tennis.Round','desc')
            ->get();
        if(count($r)>0){
            return view('SportResultView.Table_Tennis',compact('r'));
        }
        else{
            return view('SportResultView.Table_Tennis')->with('message','No Data Found');
        }

}

public function TableTennisGamesResult($MatchNo){
   
    $d=DB::table('table_tennis_games')
            ->join('unis as a','table_tennis_games.Uni1','=','a.UniID')
            ->join('unis as b','table_tennis_games.Uni2','=','b.UniID1')
            ->where('MatchNo','=',$MatchNo)
            ->select('a.UniName','a.Image','a.UniID','b.UniName1','b.Image1','b.UniID1','table_tennis_games.*')
	    //->orderBy('table_tennis_games.Date','asc')
	    ->orderBy('table_tennis_games.Round','desc')
            ->get();

    if(count($d)>0){
        return view('SportResultView.TableTennisGames',compact('d'));
    }
    else{
        return view('SportResultView.TableTennisGames')->with('message','No Data Found');
    }

}

    public function badminton(){

        $r = DB::table('badminton')
	        ->join('unis as a','badminton.Uni1','=','a.UniID')
            ->join('unis as b','badminton.Uni2','=','b.UniID1')
            //->where('a.UniID','table_tennis.Uni1')
            //->where('b.UniID1','table_tennis.Uni2')
            ->select('a.UniName','a.Image','a.UniID','b.UniName1','b.Image1','b.UniID1','badminton.*')
            ->orderBy('badminton.MatchNo','desc')
            ->get();
        if(count($r)>0){
            return view('SportResultView.Badminton',compact('r'));
        }
        else{
            return view('SportResultView.Badminton')->with('message','No Data Found');
        }
    }
    public function badmintonGamesResult($MatchNo){

        $d=DB::table('badminton_games')
            ->join('unis as a','badminton_games.Uni1','=','a.UniID')
            ->join('unis as b','badminton_games.Uni2','=','b.UniID1')
            ->where('MatchNo','=',$MatchNo)
            ->select('a.UniName','a.Image','a.UniID','b.UniName1','b.Image1','b.UniID1','badminton_games.*')
            ->get();

        if(count($d)>0){
           
            return view('SportResultView.BadmintonGames',compact('d'));
        }
        else{
            return view('SportResultView.BadmintonGames')->with('message','No Data Found');
        }

    }

    public function tennis(){
        $r = DB::table('tennis')
	        ->join('unis as a','tennis.Uni1','=','a.UniID')
            ->join('unis as b','tennis.Uni2','=','b.UniID1')
            //->where('a.UniID','table_tennis.Uni1')
            //->where('b.UniID1','table_tennis.Uni2')
            ->select('a.UniName','a.Image','a.UniID','b.UniName1','b.Image1','b.UniID1','tennis.*')
            ->orderBy('tennis.MatchNo','desc')
            ->get();
        if(count($r)>0){
            return view('SportResultView.Tennis',compact('r'));
        }
        else{
            return view('SportResultView.Tennis')->with('message','No Data Found');
        }
    }
    // public function search(Request $request){
    //     $q=Input::get('search');



    // }



    public function badmintonGames(){
        $r1= DB::table('badminton_games')->orderBy('MatchNo','desc')->get()->toArray();
        return view('SportResultView.Badminton',compact('r1'));
    }



    public function elle(){
        $r = DB::table('elle')
	        ->join('unis as a','elle.Uni1','=','a.UniID')
            ->join('unis as b','elle.Uni2','=','b.UniID1')
            //->where('a.UniID','table_tennis.Uni1')
            //->where('b.UniID1','table_tennis.Uni2')
            ->select('a.UniName','a.Image','a.UniID','b.UniName1','b.Image1','b.UniID1','elle.*')
	    ->orderBy('elle.Date','desc')
		->orderBy('elle.MatchNo','desc')
            ->orderBy('elle.Round','desc')
		->orderBy('elle.Gender','desc')
            ->get();
        if(count($r)>0){
            return view('SportResultView.Elle',compact('r'));
        }
        else{
            return view('SportResultView.Elle')->with('message','No Data Found');
        }
    }
    // public function wrestling(){
    //     $r = DB::table('wrestling')
	//         ->join('unis as a','wrestling.Uni1','=','a.UniID')
    //         ->join('unis as b','wrestling.Uni2','=','b.UniID1')
    //         //->where('a.UniID','table_tennis.Uni1')
    //         //->where('b.UniID1','table_tennis.Uni2')
    //         ->select('a.UniName','a.Image','a.UniID','b.UniName1','b.Image1','b.UniID1','wrestling.*')
    //         ->orderBy('wrestling.MatchNo','desc')
    //         ->get();
    //     return view('SportResultView.wrestling',compact('r'));
    // }
    public function carrom(){
        $r = DB::table('carrom')
	        ->join('unis as a','carrom.Uni1','=','a.UniID')
            ->join('unis as b','carrom.Uni2','=','b.UniID1')
            //->where('a.UniID','table_tennis.Uni1')
            //->where('b.UniID1','table_tennis.Uni2')
            ->select('a.UniName','a.Image','a.UniID','b.UniName1','b.Image1','b.UniID1','carrom.*')
            ->orderBy('carrom.MatchNo','desc')
            ->get();
        if(count($r)>0){
            return view('SportResultView.Carrom',compact('r'));
        }
        else{
            return view('SportResultView.Carrom')->with('message','No Data Found');
        }
    }
    public function WeightLifting(){
        $tableName=new Weightlifting;
        $table=$tableName->getTable();
        $r=DB::table('weightlifting')
            ->join('unis','weightlifting.Uni','=','unis.UniID')
            //->where(['weightlifting.Uni'=>'unis.UniID'])
            ->select('unis.*','weightlifting.*')
		->where('Rank','1')->orWhere('Rank','2')->orWhere('Rank','3')
		->orderBy('Gender','asc')
            ->orderBy('WeightCategory','asc')
		->orderBy('Total','desc')
		
            ->get();
        if(count($r)>0){
            return view('SportResultView.WeightLifting',compact('r'));
        }
        else{
            return view('SportResultView.WeightLifting')->with('message','No Data Found'); 
        }
    }
    public function weight(Request $request){

        //$table = new Weightlifting();
        //$table=$tableName->getTable();
        // $p=$table->WeightCategory;
        // $q=$table->Gender;
        $x=$request->weightclass;
        $y=$request->Gender;
       
        if($x != '' && $y != ''){
            $r=DB::table('weightlifting')
            ->join('unis','weightlifting.Uni','=','unis.UniID')
            ->where('weightlifting.WeightCategory',$x)
            ->where('weightlifting.Gender',$y)
            ->select('unis.*','weightlifting.*')
            ->orderBy('weightlifting.Rank','asc')
            ->get();
                if(count($r)>0){
                    return view('SportResultView.WeightLifting',compact('r'));
                }
        }
        elseif($x == '' && $y != '') {
            $r=DB::table('weightlifting')
            ->join('unis','weightlifting.Uni','=','unis.UniID')
            ->where('weightlifting.Gender',$y)
            ->select('unis.*','weightlifting.*')
            ->orderBy('weightlifting.Rank','asc')
            ->get();
                if(count($r)>0){
                    return view('SportResultView.WeightLifting',compact('r'));
                }
        }  
        elseif($x != '' && $y == '') {
            $r=DB::table('weightlifting')
            ->join('unis','weightlifting.Uni','=','unis.UniID')
            ->where('weightlifting.WeightCategory',$x)
            ->select('unis.*','weightlifting.*')
            ->orderBy('weightlifting.Rank','asc')
            ->get();
                if(count($r)>0){
                    return view('SportResultView.WeightLifting',compact('r'));
                }
        }    
        return view('SportResultView.WeightLifting')->with('message','No Data Found');       
    }





	public function karatekata(){
        
        $r=DB::table('karate_kata')
            ->join('unis','karate_kata.Uni','=','unis.UniID')
            //->where(['weightlifting.Uni'=>'unis.UniID'])
            ->select('unis.*','karate_kata.*')
		->orderBy('karate_kata.Team_Individual','asc')
            ->orderBy('karate_kata.Gender','asc')
            ->orderBy('karate_kata.Points','desc')
            ->get();
        if(count($r)>0){
            return view('SportResultView.Karatekata',compact('r'));
        }
        else{
            return view('SportResultView.Karatekata')->with('message','No Data Found'); 
        }
    }
    public function karatekataresult(Request $request){

        //$table = new Weightlifting();
        //$table=$tableName->getTable();
        // $p=$table->WeightCategory;
        // $q=$table->Gender;
        //$p=$request->WeightCategory;
        $q=$request->Gender;
        $r=$request->Team_Individual;
       
        if(($q != '')&&($r != '')){
            $r=DB::table('karate_kata')
            ->join('unis','karate_kata.Uni','=','unis.UniID')
             ->where('karate_kata.Gender',$q)
             ->where('karate_kata.Team_Individual',$r)
            ->select('unis.*','karate_kata.*')
        
            ->orderBy('karate_kata.Gender','asc')
            ->orderBy('karate_kata.Points','desc')
           
            ->get();
                if(count($r)>0){
                    return view('SportResultView.Karatekata',compact('r'));
                }
        }
        elseif($q != '' && $r=='') {
            $r=DB::table('karate_kata')
            ->join('unis','karate_kata.Uni','=','unis.UniID')
            ->where('karate_kata.Gender',$q)
            //->where('karate_kata.Team_Individual',$z)
            ->select('unis.*','karate_kata.*')
            ->orderBy('karate_kata.Gender','asc')
            ->orderBy('karate_kata.Points','desc')
            ->get();
                if(count($r)>0){
                    return view('SportResultView.Karatekata',compact('r'));
                }
        }
        elseif($q == '' && $r!='') {
            $r=DB::table('karate_kata')
            ->join('unis','karate_kata.Uni','=','unis.UniID')
            //->where('karate_kata.Gender',$q)
            ->where('karate_kata.Team_Individual',$r)
            ->select('unis.*','karate_kata.*')
            ->orderBy('karate_kata.Gender','asc')
            ->orderBy('karate_kata.Points','desc')
            ->get();
                if(count($r)>0){
                    return view('SportResultView.Karatekata',compact('r'));
                }
        }
                return view('SportResultView.Karatekata')->with('message','No Data Found');       
    }





    public function wrestling(){

        $r = DB::table('wrestling')
	        ->join('unis as a','wrestling.Uni1','=','a.UniID')
            ->join('unis as b','wrestling.Uni2','=','b.UniID1')
            //->where('a.UniID','table_tennis.Uni1')
            //->where('b.UniID1','table_tennis.Uni2')
            ->select('a.UniName','a.Image','a.UniID','b.UniName1','b.Image1','b.UniID1','wrestling.*')
            ->orderBy('wrestling.MatchNo','desc')
            ->get();
            if(count($r)>0){
                return view('SportResultView.wrestling',compact('r'));
            }
            else{
                return view('SportResultView.wrestling')->with('message','No Data Found'); 
            }

    }


    public function wrestlingresult(Request $request){

        //$table = new Weightlifting();
        //$table=$tableName->getTable();
        //$p=$table->WeightCategory;
        //$q=$table->Gender;
        $x=$request->weightclass;
        $y=$request->Round;

        if($x != '' && $y != ''){
            $r = DB::table('wrestling')
	        ->join('unis as a','wrestling.Uni1','=','a.UniID')
            ->join('unis as b','wrestling.Uni2','=','b.UniID1')
            ->where('wrestling.WeightCategory',$x)
            ->where('wrestling.Round',$y)
            ->select('a.UniName','a.Image','a.UniID','b.UniName1','b.Image1','b.UniID1','wrestling.*')
            ->orderBy('wrestling.MatchNo','desc')
            ->get();
                if(count($r)>0){
                    return view('SportResultView.wrestling',compact('r'));
                }
        } 
        elseif($x != '' && $y == ''){
            $r = DB::table('wrestling')
	        ->join('unis as a','wrestling.Uni1','=','a.UniID')
            ->join('unis as b','wrestling.Uni2','=','b.UniID1')
            ->where('wrestling.WeightCategory',$x)
            ->select('a.UniName','a.Image','a.UniID','b.UniName1','b.Image1','b.UniID1','wrestling.*')
            ->orderBy('wrestling.MatchNo','desc')
            ->get();
                if(count($r)>0){
                    return view('SportResultView.wrestling',compact('r'));
                }
        }  
        elseif($x == '' && $y != ''){
            $r = DB::table('wrestling')
	        ->join('unis as a','wrestling.Uni1','=','a.UniID')
            ->join('unis as b','wrestling.Uni2','=','b.UniID1')
            ->where('wrestling.Round',$y)
            ->select('a.UniName','a.Image','a.UniID','b.UniName1','b.Image1','b.UniID1','wrestling.*')
            ->orderBy('wrestling.MatchNo','desc')
            ->get();
                if(count($r)>0){
                    return view('SportResultView.wrestling',compact('r'));
                }    
                
            }
            return view('SportResultView.wrestling')->with('message','No Data Found');   
}

  public function chess(){
        $r = DB::table('chess')
	    ->join('unis as a','chess.Uni1','=','a.UniID')
            ->join('unis as b','chess.Uni2','=','b.UniID1')
            ->select('a.UniName','a.Image','a.UniID','b.UniName1','b.Image1','b.UniID1','chess.*')
            ->orderBy('chess.Round','desc')
            ->get();
        if(count($r)>0){
            return view('SportResultView.chess',compact('r'));
        }
        else{
            return view('SportResultView.chess')->with('message','No Data Found');
        }
    }





public function karatefinalkumite(){

    $s1 = DB::table('karate_kumite')
        ->join('unis','karate_kumite.Uni','=','unis.UniID')
        ->where('karate_kumite.WeightCategory','-45Kg')
        ->select('unis.*','karate_kumite.*')
        ->orderBy('karate_kumite.Rank','asc')
        ->get();
$s2 = DB::table('karate_kumite')
        ->join('unis','karate_kumite.Uni','=','unis.UniID')
        ->where('karate_kumite.WeightCategory','-50Kg')
        ->select('unis.*','karate_kumite.*')
         ->orderBy('karate_kumite.Rank','asc')  
      ->get();

$s3 = DB::table('karate_kumite')
        ->join('unis','karate_kumite.Uni','=','unis.UniID')
        ->where('karate_kumite.WeightCategory','-55Kg')
        ->select('unis.*','karate_kumite.*')
         ->orderBy('karate_kumite.Rank','asc')
        ->get();

$s4 = DB::table('karate_kumite')
        ->join('unis','karate_kumite.Uni','=','unis.UniID')
        ->where('karate_kumite.WeightCategory','-61Kg')
        ->select('unis.*','karate_kumite.*')
         ->orderBy('karate_kumite.Rank','asc')
        ->get();

$s5 = DB::table('karate_kumite')
        ->join('unis','karate_kumite.Uni','=','unis.UniID')
        ->where('karate_kumite.WeightCategory','-68Kg')
        ->select('unis.*','karate_kumite.*')
         ->orderBy('karate_kumite.Rank','asc')
        ->get();

$s6 = DB::table('karate_kumite')
        ->join('unis','karate_kumite.Uni','=','unis.UniID')
        ->where('karate_kumite.WeightCategory','+68Kg')
        ->select('unis.*','karate_kumite.*')
         ->orderBy('karate_kumite.Rank','asc')
        ->get();

	$s7 = DB::table('karate_kumite')
        ->join('unis','karate_kumite.Uni','=','unis.UniID')
        ->where('karate_kumite.WeightCategory','+84Kg')
        ->select('unis.*','karate_kumite.*')
        ->orderBy('karate_kumite.Rank','asc')
        ->get();

	$s8 = DB::table('karate_kumite')
        ->join('unis','karate_kumite.Uni','=','unis.UniID')
        ->where('karate_kumite.WeightCategory','-84Kg')
        ->select('unis.*','karate_kumite.*')
        ->orderBy('karate_kumite.Rank','asc')
        ->get();


$s9 = DB::table('karate_kumite')
        ->join('unis','karate_kumite.Uni','=','unis.UniID')
        ->where('karate_kumite.WeightCategory','-75Kg')
        ->select('unis.*','karate_kumite.*')
        ->orderBy('karate_kumite.Rank','asc')
        ->get();

	$s10 = DB::table('karate_kumite')
        ->join('unis','karate_kumite.Uni','=','unis.UniID')
        ->where('karate_kumite.WeightCategory','-67Kg')
        ->select('unis.*','karate_kumite.*')
        ->orderBy('karate_kumite.Rank','asc')
        ->get();

        $s11 = DB::table('karate_kumite')
        ->join('unis','karate_kumite.Uni','=','unis.UniID')
        ->where('karate_kumite.WeightCategory','-60Kg')
        ->select('unis.*','karate_kumite.*')
        ->orderBy('karate_kumite.Rank','asc')
        ->get();

	$s12 = DB::table('karate_kumite')
        ->join('unis','karate_kumite.Uni','=','unis.UniID')
        ->where('karate_kumite.WeightCategory','-55Kg')
        ->select('unis.*','karate_kumite.*')
        ->orderBy('karate_kumite.Rank','asc')
        ->get();

$s13 = DB::table('karate_kumite')
        ->join('unis','karate_kumite.Uni','=','unis.UniID')
        ->where('karate_kumite.WeightCategory','-50Kg')
        ->select('unis.*','karate_kumite.*')
        ->orderBy('karate_kumite.Rank','asc')
        ->get();

            return view('SportResultView.KarateKumiteFinal',compact('s1','s2','s3','s4','s5','s6','s7','s8','s9','s10','s11','s12','s13'));
    }


public function karate_kumiteresult(Request $request){

    //$table = new Weightlifting();
    //$table=$tableName->getTable();
    //$p=$table->WeightCategory;
    //$q=$table->Gender;
    $x=$request->WeightCategory;
    $y=$request->Round;

    if($x != '' && $y != ''){
        $r = DB::table('karate_kumite')
        ->join('unis as a','karate_kumite.Uni1','=','a.UniID')
        ->join('unis as b','karate_kumite.Uni2','=','b.UniID1')
        ->where('karate_kumite.WeightCategory',$x)
        ->where('karate_kumite.Round',$y)
        ->select('a.UniName','a.Image','a.UniID','b.UniName1','b.Image1','b.UniID1','karate_kumite.*')
        ->orderBy('karate_kumite.MatchNo','desc')
        ->get();
            if(count($r)>0){
                return view('SportResultView.KarateKumiteResult',compact('r'));
            }
    } 
    elseif($x != '' && $y == ''){
        $r = DB::table('karate_kumite')
        ->join('unis as a','karate_kumite.Uni1','=','a.UniID')
        ->join('unis as b','karate_kumite.Uni2','=','b.UniID1')
        ->where('karate_kumite.WeightCategory',$x)
        //->where('karate_kumite.Round',$y)
        ->select('a.UniName','a.Image','a.UniID','b.UniName1','b.Image1','b.UniID1','karate_kumite.*')
        ->orderBy('karate_kumite.MatchNo','desc')
        ->get();
            if(count($r)>0){
                return view('SportResultView.KarateKumiteResult',compact('r'));
            }
    }  
    elseif($x == '' && $y != ''){
        $r = DB::table('karate_kumite')
        ->join('unis as a','karate_kumite.Uni1','=','a.UniID')
        ->join('unis as b','karate_kumite.Uni2','=','b.UniID1')
       // ->where('karate_kumite.WeightCategory',$x)
        ->where('karate_kumite.Round',$y)
        ->select('a.UniName','a.Image','a.UniID','b.UniName1','b.Image1','b.UniID1','karate_kumite.*')
        ->orderBy('karate_kumite.MatchNo','desc')
        ->get();
            if(count($r)>0){
                return view('SportResultView.KarateKumiteResult',compact('r'));
            }    
            
        }
        return view('SportResultView.KarateKumiteResult')->with('message','No Data Found');   
}




    public function roadrace(){
        
        $r=DB::table('roadrace')
            ->join('unis','roadrace.Uni','=','unis.UniID')
            //->where(['weightlifting.Uni'=>'unis.UniID'])
            ->select('unis.*','roadrace.*')
            ->orderBy('roadrace.Rank','asc')
            ->get();
        if(count($r)>0){
            return view('SportResultView.RoadRace',compact('r'));
            }
        else{
            return view('SportResultView.RoadRace')->with('message','No Data Found');
        }
    }
    public function tracksport(){
        //$event = DB::table('trackandfield')->select('Event')->distinct('Event')->get();
        return view('SportResultView.TrackField');
    }

    public function trackfield($eventID){
        //$event = DB::table('trackandfield')->select('Event')->distinct('Event')->get();
        //$sport = DB::table('jumpingevents')->select('*')->where('Event','=',$eventID)->orderBy('Rank','asc')->get();
        //$sport1 = DB::table('runningevents')->select('*')->where('Event','=',$eventID)->orderBy('Rank','asc')->get();
        //$sport2 = DB::table('throwingevents')->select('*')->where('Event','=',$eventID)->orderBy('Rank','asc')->get();
        return view('SportResultView.TrackField',compact('event','sport','sport1','sport2'));

    }

   public function track1(){
        $sports=DB::table('trackandfield')->select('Event','Gender')->where('Event','=','100m')->first();
        $s100W=DB::table('runningevents')
                    ->join('unis','runningevents.Uni','=','unis.UniID')
                    ->select('unis.*','runningevents.*')
                    ->where('runningevents.Event','=','100m')
                    ->where('runningevents.Round','=','Final')
                    ->where('runningevents.Gender','=','W')
                    ->orderBy('runningevents.Rank','asc')
                    ->limit(3)
                    ->get();
        $s100M=DB::table('runningevents')
                    ->join('unis','runningevents.Uni','=','unis.UniID')
                    ->select('unis.*','runningevents.*')
                    ->where('runningevents.Event','=','100m')
                    ->where('runningevents.Round','=','Final')
                    ->where('runningevents.Gender','=','M')
                    ->orderBy('runningevents.Rank','asc')
                    ->limit(3)
                    ->get();
        $s200W=DB::table('runningevents')
                    ->join('unis','runningevents.Uni','=','unis.UniID')
                    ->select('unis.*','runningevents.*')
                    ->where('runningevents.Event','=','200m')
                    ->where('runningevents.Round','=','Final')
                    ->where('runningevents.Gender','=','W')
                    ->orderBy('runningevents.Rank','asc')
                    ->limit(3)
                    ->get();
        $s200M=DB::table('runningevents')
                    ->join('unis','runningevents.Uni','=','unis.UniID')
                    ->select('unis.*','runningevents.*')
                    ->where('runningevents.Event','=','200m')
                    ->where('runningevents.Round','=','Final')
                    ->where('runningevents.Gender','=','M')
                    ->orderBy('runningevents.Rank','asc')
                    ->limit(3)
                    ->get();
        $s400W=DB::table('runningevents')
                    ->join('unis','runningevents.Uni','=','unis.UniID')
                    ->select('unis.*','runningevents.*')
                    ->where('runningevents.Event','=','400m')
                    ->where('runningevents.Round','=','Final')
                    ->where('runningevents.Gender','=','W')
                    ->orderBy('runningevents.Rank','asc')
                    ->limit(3)
                    ->get();
        $s400M=DB::table('runningevents')
            ->join('unis','runningevents.Uni','=','unis.UniID')
            ->select('unis.*','runningevents.*')
            ->where('runningevents.Event','=','400m')
            ->where('runningevents.Round','=','Final')
            ->where('runningevents.Gender','=','M')
            ->orderBy('runningevents.Rank','asc')
            ->limit(3)
            ->get();
        $s800W=DB::table('runningevents')
            ->join('unis','runningevents.Uni','=','unis.UniID')
            ->select('unis.*','runningevents.*')
            ->where('runningevents.Event','=','800m')
            ->where('runningevents.Round','=','Final')
            ->where('runningevents.Gender','=','W')
            ->orderBy('runningevents.Rank','asc')
            ->limit(3)
            ->get();
        $s800M=DB::table('runningevents')
            ->join('unis','runningevents.Uni','=','unis.UniID')
            ->select('unis.*','runningevents.*')
            ->where('runningevents.Event','=','800m')
            ->where('runningevents.Round','=','Final')
            ->where('runningevents.Gender','=','M')
            ->orderBy('runningevents.Rank','asc')
            ->limit(3)
            ->get();
        $s1500W=DB::table('runningevents')
            ->join('unis','runningevents.Uni','=','unis.UniID')
            ->select('unis.*','runningevents.*')
            ->where('runningevents.Event','=','1500m')
            ->where('runningevents.Round','=','Final')
            ->where('runningevents.Gender','=','W')
            ->orderBy('runningevents.Rank','asc')
            ->limit(3)
            ->get();
        $s1500M=DB::table('runningevents')
            ->join('unis','runningevents.Uni','=','unis.UniID')
            ->select('unis.*','runningevents.*')
            ->where('runningevents.Event','=','1500m')
            ->where('runningevents.Round','=','Final')
            ->where('runningevents.Gender','=','M')
            ->orderBy('runningevents.Rank','asc')
            ->limit(3)
            ->get();
        $s5000W=DB::table('runningevents')
            ->join('unis','runningevents.Uni','=','unis.UniID')
            ->select('unis.*','runningevents.*')
            ->where('runningevents.Event','=','5000m')
            ->where('runningevents.Round','=','Final')
            ->where('runningevents.Gender','=','W')
            ->orderBy('runningevents.Rank','asc')
            ->limit(3)
            ->get();
        $s5000M=DB::table('runningevents')
            ->join('unis','runningevents.Uni','=','unis.UniID')
            ->select('unis.*','runningevents.*')
            ->where('runningevents.Event','=','5000m')
            ->where('runningevents.Round','=','Final')
            ->where('runningevents.Gender','=','M')
            ->orderBy('runningevents.Rank','asc')
            ->limit(3)
            ->get();
        $s110W=DB::table('runningevents')
            ->join('unis','runningevents.Uni','=','unis.UniID')
            ->select('unis.*','runningevents.*')
            ->where('runningevents.Event','=','100m Hurdles')
            ->where('runningevents.Round','=','Final')
            ->where('runningevents.Gender','=','W')
            ->orderBy('runningevents.Rank','asc')
            ->limit(3)
            ->get();
        $s110M=DB::table('runningevents')
            ->join('unis','runningevents.Uni','=','unis.UniID')
            ->select('unis.*','runningevents.*')
            ->where('runningevents.Event','=','110m Hurdles')
            ->where('runningevents.Round','=','Final')
            ->where('runningevents.Gender','=','M')
            ->orderBy('runningevents.Rank','asc')
            ->limit(3)
            ->get();
        $s400HW=DB::table('runningevents')
            ->join('unis','runningevents.Uni','=','unis.UniID')
            ->select('unis.*','runningevents.*')
            ->where('runningevents.Event','=','400m Hurdles')
            ->where('runningevents.Round','=','Final')
            ->where('runningevents.Gender','=','W')
            ->orderBy('runningevents.Rank','asc')
            ->limit(3)
            ->get();
        $s400HM=DB::table('runningevents')
            ->join('unis','runningevents.Uni','=','unis.UniID')
            ->select('unis.*','runningevents.*')
            ->where('runningevents.Event','=','400m Hurdles')
            ->where('runningevents.Round','=','Final')
            ->where('runningevents.Gender','=','M')
            ->orderBy('runningevents.Rank','asc')
            ->limit(3)
            ->get();

        return view('SportResultView.track100m',compact('sports','s100M','s100W','s200M','s200W','s400M','s400W','s800M','s800W','s1500M','s1500W','s5000M','s5000W','s110M','s110W','s400HM','s400HW'));
    }
    public function track2(){
        $highjM=DB::table('jumpingevents')
                ->join('unis','jumpingevents.Uni','=','unis.UniID')
                ->select('unis.*','jumpingevents.*')
                ->where('jumpingevents.Event','=','High Jump')
                ->where('jumpingevents.Round','=','Final')
                ->where('jumpingevents.Gender','=','M')
                ->orderBy('jumpingevents.Rank','asc')
                ->limit(3)
                ->get();
        $highjW=DB::table('jumpingevents')
            ->join('unis','jumpingevents.Uni','=','unis.UniID')
            ->select('unis.*','jumpingevents.*')
            ->where('jumpingevents.Event','=','High Jump')
            ->where('jumpingevents.Round','=','Final')
            ->where('jumpingevents.Gender','=','W')
            ->orderBy('jumpingevents.Rank','asc')
            ->limit(3)
            ->get();

        $longjM=DB::table('jumpingevents')
            ->join('unis','jumpingevents.Uni','=','unis.UniID')
            ->select('unis.*','jumpingevents.*')
            ->where('jumpingevents.Event','=','Long Jump')
            ->where('jumpingevents.Round','=','Final')
            ->where('jumpingevents.Gender','=','M')
            ->orderBy('jumpingevents.Rank','asc')
            ->limit(3)
            ->get();

        $longjW=DB::table('jumpingevents')
            ->join('unis','jumpingevents.Uni','=','unis.UniID')
            ->select('unis.*','jumpingevents.*')
            ->where('jumpingevents.Event','=','Long Jump')
            ->where('jumpingevents.Round','=','Final')
            ->where('jumpingevents.Gender','=','W')
            ->orderBy('jumpingevents.Rank','asc')
            ->limit(3)
            ->get();

        $triplejM=DB::table('jumpingevents')
            ->join('unis','jumpingevents.Uni','=','unis.UniID')
            ->select('unis.*','jumpingevents.*')
            ->where('jumpingevents.Event','=','Triple Jump')
            ->where('jumpingevents.Round','=','Final')
            ->where('jumpingevents.Gender','=','M')
            ->orderBy('jumpingevents.Rank','asc')
            ->limit(3)
            ->get();

        $triplejW=DB::table('jumpingevents')
            ->join('unis','jumpingevents.Uni','=','unis.UniID')
            ->select('unis.*','jumpingevents.*')
            ->where('jumpingevents.Event','=','Triple Jump')
            ->where('jumpingevents.Round','=','Final')
            ->where('jumpingevents.Gender','=','W')
            ->orderBy('jumpingevents.Rank','asc')
            ->limit(3)
            ->get();

        $poleM=DB::table('jumpingevents')
            ->join('unis','jumpingevents.Uni','=','unis.UniID')
            ->select('unis.*','jumpingevents.*')
            ->where('jumpingevents.Event','=','Pole Vault')
            ->where('jumpingevents.Round','=','Final')
            ->where('jumpingevents.Gender','=','M')
            ->orderBy('jumpingevents.Rank','asc')
            ->limit(3)
            ->get();



        //$sport3=DB::table('throwingevents')->select('*')->where('Event','=','Pole Vault')->orderBy('Rank','asc')->get();
        //rt7=DB::table('jumpingevents')->select('*')->where('Event','=','400m Hurdles')->get();

        return view('SportResultView.trackjumping',compact('highjM','highjW','longjM','longjW','triplejM','triplejW','poleM'));
    }

    public function track3(){
        $shotputM=DB::table('throwingevents')
            ->join('unis','throwingevents.Uni','=','unis.UniID')
            ->select('unis.*','throwingevents.*')
            ->where('throwingevents.Event','=','Shot Put')
            ->where('throwingevents.Round','=','Final')
            ->where('throwingevents.Gender','=','M')
            ->orderBy('throwingevents.Rank','asc')
            ->limit(3)
            ->get();

        $shotputW=DB::table('throwingevents')
            ->join('unis','throwingevents.Uni','=','unis.UniID')
            ->select('unis.*','throwingevents.*')
            ->where('throwingevents.Event','=','Shot Put')
            ->where('throwingevents.Round','=','Final')
            ->where('throwingevents.Gender','=','W')
            ->orderBy('throwingevents.Rank','asc')
            ->limit(3)
            ->get();

        $javelinM=DB::table('throwingevents')
            ->join('unis','throwingevents.Uni','=','unis.UniID')
            ->select('unis.*','throwingevents.*')
            ->where('throwingevents.Event','=','Javelin Throw')
            ->where('throwingevents.Round','=','Final')
            ->where('throwingevents.Gender','=','M')
            ->orderBy('throwingevents.Rank','asc')
            ->limit(3)
            ->get();

        $javelinW=DB::table('throwingevents')
            ->join('unis','throwingevents.Uni','=','unis.UniID')
            ->select('unis.*','throwingevents.*')
            ->where('throwingevents.Event','=','Javelin Throw')
            ->where('throwingevents.Round','=','Final')
            ->where('throwingevents.Gender','=','W')
            ->orderBy('throwingevents.Rank','asc')
            ->limit(3)
            ->get();

        $discusM=DB::table('throwingevents')
            ->join('unis','throwingevents.Uni','=','unis.UniID')
            ->select('unis.*','throwingevents.*')
            ->where('throwingevents.Event','=','Discus Throw')
            ->where('throwingevents.Round','=','Final')
            ->where('throwingevents.Gender','=','M')
            ->orderBy('throwingevents.Rank','asc')
            ->limit(3)
            ->get();

        $discusW=DB::table('throwingevents')
            ->join('unis','throwingevents.Uni','=','unis.UniID')
            ->select('unis.*','throwingevents.*')
            ->where('throwingevents.Event','=','Discus Throw')
            ->where('throwingevents.Round','=','Final')
            ->where('throwingevents.Gender','=','W')
            ->orderBy('throwingevents.Rank','asc')
            ->limit(3)
            ->get();
        return view('SportResultView.trackThrowing',compact('shotputM','shotputW','javelinM','javelinW','discusM','discusW'));
    }


    public function menstotal(){
        $r= DB::table('total')
		->join('unis','unis.UniName','=','total.UniName')
		->select('unis.*','total.*')
		->orderBy('MensTotal','desc')->get();
        return view('home.MensTotal',compact('r'));
    }

    public function feedback(Request $request){
        $name=$request['name'];
        $email=$request['email'];
        $feedback=$request['feedback'];

        DB::table('feedback')->insert(
            ['Name'=>$name,'Email' => $email,'Feedback' => $feedback]
        );

        //echo $name;
        return view('home.NewHome');
    }

    public function womenstotal(){
        $r= DB::table('total')
	->join('unis','unis.UniName','=','total.UniName')
	->select('unis.*','total.*')
	->orderBy('WomensTotal','desc')->get();
        return view('home.WomensTotal',compact('r'));
    }

    public function total(){
        $r= DB::table('total')
		->join('unis','unis.UniName','=','total.UniName')
		->select('unis.*','total.*')
		->orderBy('total','desc')
		->get();
        return view('home.Total',compact('r'));
    }

      public function RunningResults(){
        $r1=DB::table('trackandfield')->select('Event')->where('Type','Running')->distinct()->get();
       	$r2=DB::table('trackandfield')->select('Gender')->distinct()->get();
	$r3=DB::table('runningevents')->select('Round')->distinct()->get();
	    $r=DB::table('runningevents')
            ->join('unis','runningevents.Uni','=','unis.UniID')
            ->select('unis.*','runningevents.*')
            //->where('runningevents.Event','=',$x)
            //->where('runningevents.Round','=',$y)
            //->where('runningevents.Gender','=',$z)
	    ->orderBy('runningevents.Event','asc')
		->orderBy('runningevents.Round','asc')
		->orderBy('runningevents.Gender','asc')
		->orderBy('runningevents.Rank','asc')
	    ->orderBy('runningevents.Gender','asc')
            ->get();
	 return view('SportResultView.RunningResults',compact('r','r1','r2','r3'));
    }

   public function SearchRunningResults(Request $request){
        $r1=DB::table('trackandfield')->select('Event')->where('Type','Running')->distinct()->get();
       	$r2=DB::table('trackandfield')->select('Gender')->distinct()->get();
	$r3=DB::table('runningevents')->select('Round')->distinct()->get();

		$p=$request->Event;
		$q=$request->Round;
		$r5=$request->Gender;

	if($p != '' && $q != '' && $r5 != ''){
	    $r=DB::table('runningevents')
            ->join('unis','runningevents.Uni','=','unis.UniID')
            ->select('unis.*','runningevents.*')
            ->where('runningevents.Event','=',$p)
            ->where('runningevents.Round','=',$q)
            ->where('runningevents.Gender','=',$r5)
	    ->orderBy('runningevents.Event','asc')
	    ->orderBy('runningevents.Rank','asc')
	    ->orderBy('runningevents.Gender','asc')
            ->get();
		if(count($r)>0){
	 		return view('SportResultView.RunningResults',compact('r'))->with('r1',$r1)->with('r2',$r2)->with('r3',$r3);
		}
	}
	 elseif($p != '' && $q != '' && $r5=='') {
            $r=DB::table('runningevents')
            ->join('unis','runningevents.Uni','=','unis.UniID')
            ->select('unis.*','runningevents.*')
            ->where('runningevents.Event','=',$p)
            ->where('runningevents.Round','=',$q)
            //->where('runningevents.Gender','=',$r5)
	    ->orderBy('runningevents.Event','asc')
		->orderBy('runningevents.Rank','asc')
	    ->orderBy('runningevents.Gender','asc')
            ->get();
		if(count($r)>0){
	 		return view('SportResultView.RunningResults',compact('r'))->with('r1',$r1)->with('r2',$r2)->with('r3',$r3);
		}
        }
        elseif($p != '' && $q == '' && $r5!='') {
            $r=DB::table('runningevents')
            ->join('unis','runningevents.Uni','=','unis.UniID')
            ->select('unis.*','runningevents.*')
            ->where('runningevents.Event','=',$p)
            //->where('runningevents.Round','=',$q)
            ->where('runningevents.Gender','=',$r5)
	    ->orderBy('runningevents.Event','asc')
		->orderBy('runningevents.Rank','asc')
	    ->orderBy('runningevents.Gender','asc')
            ->get();
		if(count($r)>0){
	 		return view('SportResultView.RunningResults',compact('r'))->with('r1',$r1)->with('r2',$r2)->with('r3',$r3);
		}
        }
        elseif($p == '' && $q != '' && $r5!='') {
            $r=DB::table('runningevents')
            ->join('unis','runningevents.Uni','=','unis.UniID')
            ->select('unis.*','runningevents.*')
            //->where('runningevents.Event','=',$p)
            ->where('runningevents.Round','=',$q)
            ->where('runningevents.Gender','=',$r5)
	    ->orderBy('runningevents.Event','asc')
		->orderBy('runningevents.Rank','asc')
	    ->orderBy('runningevents.Gender','asc')
            ->get();
		if(count($r)>0){
	 		return view('SportResultView.RunningResults',compact('r'))->with('r1',$r1)->with('r2',$r2)->with('r3',$r3);
		}
        }
        elseif($p == '' && $q == '' && $r5!='') {
            $r=DB::table('runningevents')
            ->join('unis','runningevents.Uni','=','unis.UniID')
            ->select('unis.*','runningevents.*')
            //->where('runningevents.Event','=',$p)
            //->where('runningevents.Round','=',$q)
            ->where('runningevents.Gender','=',$r5)
	    ->orderBy('runningevents.Event','asc')
		->orderBy('runningevents.Rank','asc')
	    ->orderBy('runningevents.Gender','asc')
            ->get();
		if(count($r)>0){
	 		return view('SportResultView.RunningResults',compact('r'))->with('r1',$r1)->with('r2',$r2)->with('r3',$r3);
		}
        }
        elseif($p == '' && $q != '' && $r5=='') {
            $r=DB::table('runningevents')
            ->join('unis','runningevents.Uni','=','unis.UniID')
            ->select('unis.*','runningevents.*')
            //->where('runningevents.Event','=',$p)
            ->where('runningevents.Round','=',$q)
            //->where('runningevents.Gender','=',$r5)
	    ->orderBy('runningevents.Event','asc')
		->orderBy('runningevents.Rank','asc')
	    ->orderBy('runningevents.Gender','asc')
            ->get();
		if(count($r)>0){
	 		return view('SportResultView.RunningResults',compact('r'))->with('r1',$r1)->with('r2',$r2)->with('r3',$r3);
		}
        }
        elseif($p != '' && $q == '' && $r5=='') {
            $r=DB::table('runningevents')
            ->join('unis','runningevents.Uni','=','unis.UniID')
            ->select('unis.*','runningevents.*')
            ->where('runningevents.Event','=',$p)
            //->where('runningevents.Round','=',$q)
            //->where('runningevents.Gender','=',$r5)
	    ->orderBy('runningevents.Event','asc')
		->orderBy('runningevents.Rank','asc')
	    ->orderBy('runningevents.Gender','asc')
            ->get();
		if(count($r)>0){
	 		return view('SportResultView.RunningResults',compact('r'))->with('r1',$r1)->with('r2',$r2)->with('r3',$r3);
		}
	}

        return view('SportResultView.RunningResults')->with('message','No Data Founds')->with('r1',$r1)->with('r2',$r2)->with('r3',$r3);    
	
    }










    public function JumpingResults(){
        $r1=DB::table('trackandfield')->select('Event')->where('Type','Jumping')->distinct()->get();
       	$r2=DB::table('trackandfield')->select('Gender')->distinct()->get();
	    $r=DB::table('jumpingevents')
            ->join('unis','jumpingevents.Uni','=','unis.UniID')
            ->select('unis.*','jumpingevents.*')
	    ->orderBy('jumpingevents.Event','asc')
	    ->orderBy('jumpingevents.Gender','asc')
	    ->orderBy('jumpingevents.Rank','asc')
	    ->orderBy('jumpingevents.Gender','asc')
            ->get();
	 return view('SportResultView.JumpingResults',compact('r','r1','r2'));
    }

   public function SearchJumpingResults(Request $request){

        $r1=DB::table('trackandfield')->select('Event')->where('Type','Jumping')->distinct()->get();
       	$r2=DB::table('trackandfield')->select('Gender')->distinct()->get();

		$p=$request->Event;
		$r5=$request->Gender;

	if($p != ''  && $r5 != ''){
	    $r=DB::table('jumpingevents')
            ->join('unis','jumpingevents.Uni','=','unis.UniID')
            ->select('unis.*','jumpingevents.*')
            ->where('jumpingevents.Event','=',$p)
            ->where('jumpingevents.Gender','=',$r5)
	    ->orderBy('jumpingevents.Event','asc')
	    ->orderBy('jumpingevents.Rank','asc')
	    ->orderBy('jumpingevents.Gender','asc')
            ->get();
		if(count($r)>0){
	 		return view('SportResultView.JumpingResults',compact('r'))->with('r1',$r1)->with('r2',$r2);
		}
	}
	 elseif($p != '' && $r5=='') {
            $r=DB::table('jumpingevents')
            ->join('unis','jumpingevents.Uni','=','unis.UniID')
            ->select('unis.*','jumpingevents.*')
            ->where('jumpingevents.Event','=',$p)
	    ->orderBy('jumpingevents.Event','asc')
	    ->orderBy('jumpingevents.Rank','asc')
	    ->orderBy('jumpingevents.Gender','asc')
            ->get();
		if(count($r)>0){
	 		return view('SportResultView.JumpingResults',compact('r'))->with('r1',$r1)->with('r2',$r2);
		}
        }
        elseif($p == '' && $r5!='') {
            $r=DB::table('jumpingevents')
            ->join('unis','jumpingevents.Uni','=','unis.UniID')
            ->select('unis.*','jumpingevents.*')
            ->where('jumpingevents.Gender','=',$r5)
	    ->orderBy('jumpingevents.Event','asc')
		->orderBy('jumpingevents.Rank','asc')
	    ->orderBy('jumpingevents.Gender','asc')
            ->get();
		if(count($r)>0){
	 		return view('SportResultView.JumpingResults',compact('r'))->with('r1',$r1)->with('r2',$r2);
		}
        }
       
        return view('SportResultView.JumpingResults')->with('message','No Data Founds')->with('r1',$r1)->with('r2',$r2);   
	
    }

	  public function ThrowingResults(){
        	$r1=DB::table('trackandfield')->select('Event')->where('Type','Throwing')->distinct()->get();
       		$r2=DB::table('trackandfield')->select('Gender')->distinct()->get();
	    $r=DB::table('throwingevents')
            ->join('unis','throwingevents.Uni','=','unis.UniID')
            ->select('unis.*','throwingevents.*')
	    ->orderBy('throwingevents.Event','asc')
	    ->orderBy('throwingevents.Gender','asc')
	    ->orderBy('throwingevents.Rank','asc')
	    ->orderBy('throwingevents.Gender','asc')
            ->get();
	 return view('SportResultView.ThrowingResults',compact('r','r1','r2'));
    }

   public function SearchThrowingResults(Request $request){

        $r1=DB::table('trackandfield')->select('Event')->where('Type','Throwing')->distinct()->get();
       	$r2=DB::table('trackandfield')->select('Gender')->distinct()->get();

		$p=$request->Event;
		$r5=$request->Gender;

	if($p != ''  && $r5 != ''){
	    $r=DB::table('throwingevents')
            ->join('unis','throwingevents.Uni','=','unis.UniID')
            ->select('unis.*','throwingevents.*')
            ->where('throwingevents.Event','=',$p)
            ->where('throwingevents.Gender','=',$r5)
	    ->orderBy('throwingevents.Event','asc')
	    ->orderBy('throwingevents.Rank','asc')
	    ->orderBy('throwingevents.Gender','asc')
            ->get();
		if(count($r)>0){
	 		return view('SportResultView.ThrowingResults',compact('r'))->with('r1',$r1)->with('r2',$r2);
		}
	}
	 elseif($p != '' && $r5=='') {
            $r=DB::table('throwingevents')
            ->join('unis','throwingevents.Uni','=','unis.UniID')
            ->select('unis.*','throwingevents.*')
            ->where('throwingevents.Event','=',$p)
	    ->orderBy('throwingevents.Event','asc')
	    ->orderBy('throwingevents.Rank','asc')
	    ->orderBy('throwingevents.Gender','asc')
            ->get();
		if(count($r)>0){
	 		return view('SportResultView.ThrowingResults',compact('r'))->with('r1',$r1)->with('r2',$r2);
		}
        }
        elseif($p == '' && $r5!='') {
            $r=DB::table('throwingevents')
            ->join('unis','throwingevents.Uni','=','unis.UniID')
            ->select('unis.*','throwingevents.*')
            ->where('throwingevents.Gender','=',$r5)
	    ->orderBy('throwingevents.Event','asc')
		->orderBy('throwingevents.Rank','asc')
	    ->orderBy('throwingevents.Gender','asc')
            ->get();
		if(count($r)>0){
	 		return view('SportResultView.ThrowingResults',compact('r'))->with('r1',$r1)->with('r2',$r2);
		}
        }
       
        return view('SportResultView.ThrowingResults')->with('message','No Data Founds')->with('r1',$r1)->with('r2',$r2);   
	
    }

    public function SwimmingResults(){
        $r=DB::table('swimming_individual');
        return view('SportResultView.Swimming');
    }

    public function SwimmingIndividualResults(){
        $s50FM=DB::table('swimming_individual')
            ->join('unis','swimming_individual.Uni','=','unis.UniID')
            ->select('unis.*','swimming_individual.*')
            ->where('swimming_individual.Event','=','50m Butterfly')
	     ->where('swimming_individual.Gender','=','Men')
            ->where('swimming_individual.Round','=','Heats1')
	    //->orWhere('swimming_individual.Round','=','Heats2')
            ->orderBy('swimming_individual.Rank','asc')
            ->limit(3)
            ->get();

        $s50FW=DB::table('swimming_individual')
            ->join('unis','swimming_individual.Uni','=','unis.UniID')
            ->select('unis.*','swimming_individual.*')
            ->where('swimming_individual.Event','=','50m Freestyle')
            ->where('swimming_individual.Round','=','Heats1')
	    //->orWhere('swimming_individual.Round','=','Heats2')
            ->where('swimming_individual.Gender','=','Women')
            ->orderBy('swimming_individual.Rank','asc')
            ->limit(3)
            ->get();

        $s100FM=DB::table('swimming_individual')
            ->join('unis','swimming_individual.Uni','=','unis.UniID')
            ->select('unis.*','swimming_individual.*')
            ->where('swimming_individual.Event','=','100m Freestyle')
            ->where('swimming_individual.Round','=','Heats1')
	    //->orWhere('swimming_individual.Round','=','Heats2')
            ->where('swimming_individual.Gender','=','Men')
            ->orderBy('swimming_individual.Rank','asc')
            ->limit(3)
            ->get();

        $s100FW=DB::table('swimming_individual')
            ->join('unis','swimming_individual.Uni','=','unis.UniID')
            ->select('unis.*','swimming_individual.*')
            ->where('swimming_individual.Event','=','100m Freestyle')
            ->where('swimming_individual.Round','=','Heats1')
	    //->orWhere('swimming_individual.Round','=','Heats2')
            ->where('swimming_individual.Gender','=','Women')
            ->orderBy('swimming_individual.Rank','asc')
            ->limit(3)
            ->get();

        $s200FM=DB::table('swimming_individual')
            ->join('unis','swimming_individual.Uni','=','unis.UniID')
            ->select('unis.*','swimming_individual.*')
            ->where('swimming_individual.Event','=','200m Freestyle')
            ->where('swimming_individual.Round','=','Heats1')
	    //->orWhere('swimming_individual.Round','=','Heats2')
            ->where('swimming_individual.Gender','=','Men')
            ->orderBy('swimming_individual.Rank','asc')
            ->limit(3)
            ->get();

        $s200FW=DB::table('swimming_individual')
            ->join('unis','swimming_individual.Uni','=','unis.UniID')
            ->select('unis.*','swimming_individual.*')
            ->where('swimming_individual.Event','=','200m Freestyle')
            ->where('swimming_individual.Round','=','Heats1')
	    //->orWhere('swimming_individual.Round','=','Heats2')
            ->where('swimming_individual.Gender','=','Women')
            ->orderBy('swimming_individual.Rank','asc')
            ->limit(3)
            ->get();

        $s400FM=DB::table('swimming_individual')
            ->join('unis','swimming_individual.Uni','=','unis.UniID')
            ->select('unis.*','swimming_individual.*')
            ->where('swimming_individual.Event','=','400m Freestyle')
            ->where('swimming_individual.Round','=','Heats1')
	    //->orWhere('swimming_individual.Round','=','Heats2')
            ->where('swimming_individual.Gender','=','Men')
            ->orderBy('swimming_individual.Rank','asc')
            ->limit(3)
            ->get();

        $s50BAM=DB::table('swimming_individual')
            ->join('unis','swimming_individual.Uni','=','unis.UniID')
            ->select('unis.*','swimming_individual.*')
            ->where('swimming_individual.Event','=','50m Backstroke')
            ->where('swimming_individual.Round','=','Heats1')
	    //->orWhere('swimming_individual.Round','=','Heats2')
            ->where('swimming_individual.Gender','=','Men')
            ->orderBy('swimming_individual.Rank','asc')
            ->limit(3)
            ->get();

        $s50BAW=DB::table('swimming_individual')
            ->join('unis','swimming_individual.Uni','=','unis.UniID')
            ->select('unis.*','swimming_individual.*')
            ->where('swimming_individual.Event','=','50m Backstroke')
            ->where('swimming_individual.Round','=','Heats1')
	    //->orWhere('swimming_individual.Round','=','Heats2')
            ->where('swimming_individual.Gender','=','Women')
            ->orderBy('swimming_individual.Rank','asc')
            ->limit(3)
            ->get();

        $s100BAM=DB::table('swimming_individual')
            ->join('unis','swimming_individual.Uni','=','unis.UniID')
            ->select('unis.*','swimming_individual.*')
            ->where('swimming_individual.Event','=','100m Backstroke')
            ->where('swimming_individual.Round','=','Heats1')
	    //->orWhere('swimming_individual.Round','=','Heats2')
            ->where('swimming_individual.Gender','=','Men')
            ->orderBy('swimming_individual.Rank','asc')
            ->limit(3)
            ->get();

        $s100BAW=DB::table('swimming_individual')
            ->join('unis','swimming_individual.Uni','=','unis.UniID')
            ->select('unis.*','swimming_individual.*')
            ->where('swimming_individual.Event','=','100m Backstroke')
            ->where('swimming_individual.Round','=','Heats1')
	    //->orWhere('swimming_individual.Round','=','Heats2')
            ->where('swimming_individual.Gender','=','Women')
            ->orderBy('swimming_individual.Rank','asc')
            ->limit(3)
            ->get();

        $s200BAM=DB::table('swimming_individual')
            ->join('unis','swimming_individual.Uni','=','unis.UniID')
            ->select('unis.*','swimming_individual.*')
            ->where('swimming_individual.Event','=','200m Backstroke')
            ->where('swimming_individual.Round','=','Heats1')
	    //->orWhere('swimming_individual.Round','=','Heats2')
            ->where('swimming_individual.Gender','=','Men')
            ->orderBy('swimming_individual.Rank','asc')
            ->limit(3)
            ->get();

        $s50BRM=DB::table('swimming_individual')
            ->join('unis','swimming_individual.Uni','=','unis.UniID')
            ->select('unis.*','swimming_individual.*')
            ->where('swimming_individual.Event','=','50m Breast Stroke')
            ->where('swimming_individual.Round','=','Heats1')
	    //->orWhere('swimming_individual.Round','=','Heats2')
            ->where('swimming_individual.Gender','=','Men')
            ->orderBy('swimming_individual.Rank','asc')
            ->limit(3)
            ->get();

        $s50BRW=DB::table('swimming_individual')
            ->join('unis','swimming_individual.Uni','=','unis.UniID')
            ->select('unis.*','swimming_individual.*')
            ->where('swimming_individual.Event','=','50m Breast Stroke')
            ->where('swimming_individual.Round','=','Heats1')
	    //->orWhere('swimming_individual.Round','=','Heats2')
            ->where('swimming_individual.Gender','=','Women')
            ->orderBy('swimming_individual.Rank','asc')
            ->limit(3)
            ->get();

        $s100BRM=DB::table('swimming_individual')
            ->join('unis','swimming_individual.Uni','=','unis.UniID')
            ->select('unis.*','swimming_individual.*')
            ->where('swimming_individual.Event','=','100m Breast Stroke')
            ->where('swimming_individual.Round','=','Heats1')
	    //->orWhere('swimming_individual.Round','=','Heats2')
            ->where('swimming_individual.Gender','=','Men')
            ->orderBy('swimming_individual.Rank','asc')
            ->limit(3)
            ->get();

        $s100BRW=DB::table('swimming_individual')
            ->join('unis','swimming_individual.Uni','=','unis.UniID')
            ->select('unis.*','swimming_individual.*')
            ->where('swimming_individual.Event','=','100m Breast Stroke')
            ->where('swimming_individual.Round','=','Heats1')
	    //->orWhere('swimming_individual.Round','=','Heats2')
            ->where('swimming_individual.Gender','=','Women')
            ->orderBy('swimming_individual.Rank','asc')
            ->limit(3)
            ->get();

        $s200BRM=DB::table('swimming_individual')
            ->join('unis','swimming_individual.Uni','=','unis.UniID')
            ->select('unis.*','swimming_individual.*')
            ->where('swimming_individual.Event','=','200m Breast Stroke')
            ->where('swimming_individual.Round','=','Heats1')
	    //->orWhere('swimming_individual.Round','=','Heats2')
            ->where('swimming_individual.Gender','=','Men')
            ->orderBy('swimming_individual.Rank','asc')
            ->limit(3)
            ->get();

        $s50BUM=DB::table('swimming_individual')
            ->join('unis','swimming_individual.Uni','=','unis.UniID')
            ->select('unis.*','swimming_individual.*')
            ->where('swimming_individual.Event','=','50m Butterfly')
            ->where('swimming_individual.Round','=','Heats1')
	    //->orWhere('swimming_individual.Round','=','Heats2')
            ->where('swimming_individual.Gender','=','Men')
            ->orderBy('swimming_individual.Rank','asc')
            ->limit(3)
            ->get();

        $s50BUW=DB::table('swimming_individual')
            ->join('unis','swimming_individual.Uni','=','unis.UniID')
            ->select('unis.*','swimming_individual.*')
            ->where('swimming_individual.Event','=','50m Butterfly')
            ->where('swimming_individual.Round','=','Heats1')
	    //->orWhere('swimming_individual.Round','=','Heats2')
            ->where('swimming_individual.Gender','=','Women')
            ->orderBy('swimming_individual.Rank','asc')
            ->limit(3)
            ->get();

        $s100BUM=DB::table('swimming_individual')
            ->join('unis','swimming_individual.Uni','=','unis.UniID')
            ->select('unis.*','swimming_individual.*')
            ->where('swimming_individual.Event','=','100m Butterfly')
            ->where('swimming_individual.Round','=','Heats1')
	    //->orWhere('swimming_individual.Round','=','Heats2')
            ->where('swimming_individual.Gender','=','Men')
            ->orderBy('swimming_individual.Rank','asc')
            ->limit(3)
            ->get();

        $s100BUW=DB::table('swimming_individual')
            ->join('unis','swimming_individual.Uni','=','unis.UniID')
            ->select('unis.*','swimming_individual.*')
            ->where('swimming_individual.Event','=','100m Butterfly')
           ->where('swimming_individual.Round','=','Heats1')
	    //->orWhere('swimming_individual.Round','=','Heats2')
            ->where('swimming_individual.Gender','=','Women')
            ->orderBy('swimming_individual.Rank','asc')
            ->limit(3)
            ->get();

        $s200BUM=DB::table('swimming_individual')
            ->join('unis','swimming_individual.Uni','=','unis.UniID')
            ->select('unis.*','swimming_individual.*')
            ->where('swimming_individual.Event','=','200m Butterfly')
            ->where('swimming_individual.Round','=','Heats1')
	    //->orWhere('swimming_individual.Round','=','Heats2')
            ->where('swimming_individual.Gender','=','Men')
            ->orderBy('swimming_individual.Rank','asc')
            ->limit(3)
            ->get();
      
   $s200IMM=DB::table('swimming_individual')
            ->join('unis','swimming_individual.Uni','=','unis.UniID')
            ->select('unis.*','swimming_individual.*')
            ->where('swimming_individual.Event','=','200m Individual Medley')
           ->where('swimming_individual.Round','=','Heats1')
	    //->orWhere('swimming_individual.Round','=','Heats2')
            ->Where('swimming_individual.Gender','=','Men')
            ->orderBy('swimming_individual.Rank','asc')
            ->limit(3)
            ->get();

        $s200IMW=DB::table('swimming_individual')
            ->join('unis','swimming_individual.Uni','=','unis.UniID')
            ->select('unis.*','swimming_individual.*')
            ->where('swimming_individual.Event','=','200m Individual Medley')
            ->where('swimming_individual.Round','=','Heats1')
	    //->orwhere('swimming_individual.Round','=','Heats2')
            ->where('swimming_individual.Gender','=','Women')
            ->orderBy('swimming_individual.Rank','asc')
            ->limit(3)
            ->get();

        return view('SportResultView.SwimmingIndividual',compact('s50FM','s50FW','s100FM','s100FW','s200FM','s200FW','s400FM','s50BAM','s50BAW','s100BAM','s100BAW','s200BAM','s50BRM','s50BRW','s100BRM','s100BRW','s200BRM','s50BUM','s50BUW','s100BUM','s100BUW','s200BUM','s200IMM','s200IMW'));
    }

    public function SwimmingRelayResults(){
        $s100RM=DB::table('swimming_team')
            ->join('unis','swimming_team.Uni','=','unis.UniID')
            ->select('unis.*','swimming_team.*')
            ->where('swimming_team.Event','=','4x 100m Freestyle Relay')
            ->where('swimming_team.Round','=','Finals')
            ->where('swimming_team.Gender','=','Men')
            ->orderBy('swimming_team.Rank','asc')
            ->limit(3)
            ->get();

        $s100RW=DB::table('swimming_team')
            ->join('unis','swimming_team.Uni','=','unis.UniID')
            ->select('unis.*','swimming_team.*')
            ->where('swimming_team.Event','=','4x 100m Freestyle Relay')
            ->where('swimming_team.Round','=','Finals')
            ->where('swimming_team.Gender','=','Women')
            ->orderBy('swimming_team.Rank','asc')
            ->limit(3)
            ->get();

        $s100MM=DB::table('swimming_team')
            ->join('unis','swimming_team.Uni','=','unis.UniID')
            ->select('unis.*','swimming_team.*')
            ->where('swimming_team.Event','=','4x 100m Medleys Relay')
            ->where('swimming_team.Round','=','Finals')
            ->where('swimming_team.Gender','=','Men')
            ->orderBy('swimming_team.Rank','asc')
            ->limit(3)
            ->get();

        $s100MW=DB::table('swimming_team')
            ->join('unis','swimming_team.Uni','=','unis.UniID')
            ->select('unis.*','swimming_team.*')
            ->where('swimming_team.Event','=','4x 100m Medleys Relay')
            ->where('swimming_team.Round','=','Finals')
            ->where('swimming_team.Gender','=','Women')
            ->orderBy('swimming_team.Rank','asc')
            ->limit(3)
            ->get();

        return view('SportResultView.SwimmingRelay',compact('s100MM','s100MW','s100RM','s100RW'));
    }

    public function AllSwimmingResults(){
        $r=DB::table('swimming_individual')
		->join('unis','unis.UniID','=','swimming_individual.Uni')
		->select('unis.*','swimming_individual.*')
		->orderBy('swimming_individual.Event','asc')
		->orderBy('swimming_individual.Gender','asc')
	        ->orderBy('swimming_individual.Rank','asc')   
		->get()
		->toArray();
      		if(count($r)>0){
		return view('SportResultView.SwimmingResults',compact('r'));
	}

        return view('SportResultView.SwimmingResults')->with('msg','No Results Found');
    }


	public function searchSwimmingResult(Request $request){

		$p=$request->Event;
		$q=$request->Gender;

	if($p != '' && $q != ''){
	    $r=DB::table('swimming_individual')
            ->join('unis','swimming_individual.Uni','=','unis.UniID')
            ->select('unis.*','swimming_individual.*')
            ->where('swimming_individual.Event','=',$p)
            ->where('swimming_individual.Gender','=',$q)
	    ->orderBy('swimming_individual.Event','asc')
	    ->orderBy('swimming_individual.Rank','asc')
	    ->orderBy('swimming_individual.Gender','asc')
            ->get();
		if(count($r)>0){
	 		return view('SportResultView.SwimmingResults',compact('r'));
		}
	}
	 elseif($p != '' && $q == '') {
            $r=DB::table('swimming_individual')
            ->join('unis','swimming_individual.Uni','=','unis.UniID')
            ->select('unis.*','swimming_individual.*')
            ->where('swimming_individual.Event','=',$p)
	    ->orderBy('swimming_individual.Event','asc')
		->orderBy('swimming_individual.Rank','asc')
	    ->orderBy('swimming_individual.Gender','asc')
            ->get();
		if(count($r)>0){
	 		return view('SportResultView.SwimmingResults',compact('r'));
		}
        }
        elseif($p == '' && $q != '') {
            $r=DB::table('swimming_individual')
            ->join('unis','swimming_individual.Uni','=','unis.UniID')
            ->select('unis.*','swimming_individual.*')
            ->where('swimming_individual.Gender','=',$q)
	    ->orderBy('swimming_individual.Event','asc')
		->orderBy('swimming_individual.Rank','asc')
	    ->orderBy('swimming_individual.Gender','asc')
            ->get();
		if(count($r)>0){
	 		return view('SportResultView.SwimmingResults',compact('r'));
		}
        }
               return view('SportResultView.SwimmingResults')->with('msg','No Results Founds');    

		
	}

	public function taekwondo(){

		return view('SportResultView.Taekwondoresult');

	}


    public function SparringResult(){
    	$r = DB::table('taekwondo_sparring')
        	->join('unis as a','taekwondo_sparring.Uni1','=','a.UniID')
        	->join('unis as b','taekwondo_sparring.Uni2','=','b.UniID1')
               	->select('a.UniName','a.Image','a.UniID','b.UniName1','b.Image1','b.UniID1','taekwondo_sparring.*')
		->orderBy('taekwondo_sparring.Round','desc')
        	->orderBy('taekwondo_sparring.MatchNo','desc')
        	->get();

        if(count($r)>0){
            return view('SportResultView.Taekwondo',compact('r'));
        }
        else{
            return view('SportResultView.Taekwondo')->with('message','No Data Found');
        }
    }
	public function PoomsaeResult(){

		$r=DB::table('taekwondo_individual_poomsae')
			->join('unis','taekwondo_individual_poomsae.Uni','=','unis.UniID')
			->where('taekwondo_individual_poomsae.Gender','M')
			->select('unis.*','taekwondo_individual_poomsae.*')
			->orderBy('Rank','asc')
                		->get();
            $r1=DB::table('taekwondo_individual_poomsae')
			->join('unis','taekwondo_individual_poomsae.Uni','=','unis.UniID')
			->where('taekwondo_individual_poomsae.Gender','W')
			->select('unis.*','taekwondo_individual_poomsae.*')
			->orderBy('Rank','asc')
			->get();
        $r2=DB::table('taekwondo_team_poomsae')
			->join('unis','taekwondo_team_poomsae.Uni','=','unis.UniID')
			->where('taekwondo_team_poomsae.Gender','M')
			->select('unis.*','taekwondo_team_poomsae.*')
			->orderBy('Rank','asc')
            		->get();
        $r3=DB::table('taekwondo_team_poomsae')
			->join('unis','taekwondo_team_poomsae.Uni','=','unis.UniID')
			->where('taekwondo_team_poomsae.Gender','W')
			->select('unis.*','taekwondo_team_poomsae.*')
			->orderBy('Rank','asc')
            		->get();
            
        return view('SportResultView.TaekwondoPoomsae')->with('r',$r)->with('r1',$r1)->with('r2',$r2)->with('r3',$r3);
		

    }
    public function searchTaekwondo(Request $request){

        //$table = new Weightlifting();
        //$table=$tableName->getTable();
        //$p=$table->WeightCategory;
        //$q=$table->Gender;
        $x=$request->WeightCategory;
        $y=$request->Round;
        $z=$request->Gender;
    
        if($x != '' && $y != '' && $z != ''){
            $r = DB::table('taekwondo_sparring')
            ->join('unis as a','taekwondo_sparring.Uni1','=','a.UniID')
            ->join('unis as b','taekwondo_sparring.Uni2','=','b.UniID1')
            ->where('taekwondo_sparring.WeightCategory',$x)
            ->where('taekwondo_sparring.Round',$y)
            ->where('taekwondo_sparring.Gender',$z)
            ->select('a.UniName','a.Image','a.UniID','b.UniName1','b.Image1','b.UniID1','taekwondo_sparring.*')
            ->orderBy('taekwondo_sparring.MatchNo','desc')
            ->get();
                if(count($r)>0){
                    return view('SportResultView.Taekwondo',compact('r'));
                }
        } 
        elseif($x != '' && $y != '' && $z ==''){
            $r = DB::table('taekwondo_sparring')
            ->join('unis as a','taekwondo_sparring.Uni1','=','a.UniID')
            ->join('unis as b','taekwondo_sparring.Uni2','=','b.UniID1')
            ->where('taekwondo_sparring.WeightCategory',$x)
            ->where('taekwondo_sparring.Round',$y)
            //->where('taekwondo_sparring.Gender',$y)
            ->select('a.UniName','a.Image','a.UniID','b.UniName1','b.Image1','b.UniID1','taekwondo_sparring.*')
            ->orderBy('taekwondo_sparring.MatchNo','desc')
            ->get();
                if(count($r)>0){
                    return view('SportResultView.Taekwondo',compact('r'));
                }
        }  
        elseif($x == '' && $y != '' && $z!=''){
            $r = DB::table('taekwondo_sparring')
            ->join('unis as a','taekwondo_sparring.Uni1','=','a.UniID')
            ->join('unis as b','taekwondo_sparring.Uni2','=','b.UniID1')
            //->where('taekwondo_sparring.WeightCategory',$x)
            ->where('taekwondo_sparring.Round',$y)
            ->where('taekwondo_sparring.Gender',$z)
            ->select('a.UniName','a.Image','a.UniID','b.UniName1','b.Image1','b.UniID1','taekwondo_sparring.*')
            ->orderBy('taekwondo_sparring.MatchNo','desc')
            ->get();
                if(count($r)>0){
                    return view('SportResultView.Taekwondo',compact('r'));
                }
            }
        elseif($x != '' && $y == '' && $z!=''){
                    $r = DB::table('taekwondo_sparring')
                    ->join('unis as a','taekwondo_sparring.Uni1','=','a.UniID')
                    ->join('unis as b','taekwondo_sparring.Uni2','=','b.UniID1')
                    ->where('taekwondo_sparring.WeightCategory',$x)
                    //->where('taekwondo_sparring.Round',$y)
                    ->where('taekwondo_sparring.Gender',$z)
                    ->select('a.UniName','a.Image','a.UniID','b.UniName1','b.Image1','b.UniID1','taekwondo_sparring.*')
                    ->orderBy('taekwondo_sparring.MatchNo','desc')
                    ->get();
                        if(count($r)>0){
                            return view('SportResultView.Taekwondo',compact('r'));
                        }
                    }
            elseif($x == '' && $y == '' && $z!=''){
                            $r = DB::table('taekwondo_sparring')
                            ->join('unis as a','taekwondo_sparring.Uni1','=','a.UniID')
                            ->join('unis as b','taekwondo_sparring.Uni2','=','b.UniID1')
                            //->where('taekwondo_sparring.WeightCategory',$x)
                            //->where('taekwondo_sparring.Round',$y)
                            ->where('taekwondo_sparring.Gender',$z)
                            ->select('a.UniName','a.Image','a.UniID','b.UniName1','b.Image1','b.UniID1','taekwondo_sparring.*')
                            ->orderBy('taekwondo_sparring.MatchNo','desc')
                            ->get();
                                if(count($r)>0){
                                    return view('SportResultView.Taekwondo',compact('r'));
                                }
                            }
            elseif($x != '' && $y == '' && $z==''){
                                    $r = DB::table('taekwondo_sparring')
                                    ->join('unis as a','taekwondo_sparring.Uni1','=','a.UniID')
                                    ->join('unis as b','taekwondo_sparring.Uni2','=','b.UniID1')
                                    ->where('taekwondo_sparring.WeightCategory',$x)
                                    //->where('taekwondo_sparring.Round',$y)
                                    //->where('taekwondo_sparring.Gender',$z)
                                    ->select('a.UniName','a.Image','a.UniID','b.UniName1','b.Image1','b.UniID1','taekwondo_sparring.*')
                                    ->orderBy('taekwondo_sparring.MatchNo','desc')
                                    ->get();
                                        if(count($r)>0){
                                            return view('SportResultView.Taekwondo',compact('r'));
                                        }
                                    }
            elseif($x == '' && $y != '' && $z==''){
                                            $r = DB::table('taekwondo_sparring')
                                            ->join('unis as a','taekwondo_sparring.Uni1','=','a.UniID')
                                            ->join('unis as b','taekwondo_sparring.Uni2','=','b.UniID1')
                                            //->where('taekwondo_sparring.WeightCategory',$x)
                                            ->where('taekwondo_sparring.Round',$y)
                                            //->where('taekwondo_sparring.Gender',$z)
                                            ->select('a.UniName','a.Image','a.UniID','b.UniName1','b.Image1','b.UniID1','taekwondo_sparring.*')
                                            ->orderBy('taekwondo_sparring.MatchNo','desc')
                                            ->get();
                                                if(count($r)>0){
                                                    return view('SportResultView.Taekwondo',compact('r'));
                                                }
                                            }
            return view('SportResultView.Taekwondo')->with('message','No Data Founds');   
    }


public function OnGoingGames(){
        $r = DB::table('ongoinggames')
            ->join('unis as a','ongoinggames.Uni1','=','a.UniID')
            ->join('unis as b','ongoinggames.Uni2','=','b.UniID1')
            ->where('Ongoing','T')
            //->where('a.UniID','table_tennis.Uni1')
            //->where('b.UniID1','table_tennis.Uni2')
            ->select('a.UniName','a.Image','a.UniID','b.UniName1','b.Image1','b.UniID1','ongoinggames.*')
            //
            //->orderBy('rugbyfootball.MatchNo','desc')
            ->get();
        return view('SportResultView.OnGoing_Games',compact('r'));

    }

 public function rowing(){
        $r=DB::table('rowing')
            ->join('unis','rowing.Uni','=','unis.UniID')
            //->where(['weightlifting.Uni'=>'unis.UniID'])
            ->select('unis.*','rowing.*')
            ->where('Gender','M')
            //->groupBy('MatchCategory')
            ->orderBy('MatchCategory')
            ->orderBy('Rank','asc')
            ->get();

        $rr=DB::table('rowing')
            ->join('unis','rowing.Uni','=','unis.UniID')
            //->where(['weightlifting.Uni'=>'unis.UniID'])
            ->select('unis.*','rowing.*')->where('Gender','W')
            //->groupBy('MatchCategory')
            ->orderBy('MatchCategory')->orderBy('Gender')
            ->orderBy('Rank','asc')
            ->get();

        return view('SportResultView.Rowing',compact('r','rr'));
    }
 public function tae(){
        $r = DB::table('sparing')
            ->join('unis as a','sparing.Uni','=','a.UniID')
            //->where('a.UniID','table_tennis.Uni1')
            //->where('b.UniID1','table_tennis.Uni2')
            ->select('a.UniName','a.Image','a.UniID','sparing.*')
            ->where('Gender','M')
            ->orderBy('sparing.WeightCategory','asc')
	    ->orderBy('sparing.Rank','asc')
            ->get();

        $rr = DB::table('sparing')
            ->join('unis as a','sparing.Uni','=','a.UniID')
            //->where('a.UniID','table_tennis.Uni1')
            //->where('b.UniID1','table_tennis.Uni2')
            ->select('a.UniName','a.Image','a.UniID','sparing.*')
            ->where('Gender','W')
            ->orderBy('sparing.WeightCategory','asc')
		->orderBy('sparing.Rank','asc')
            ->get();

        return view('SportResultView.Tae',compact('r','rr'));
    }

}