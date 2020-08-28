<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Resources\Notice as NoticeResource;
use App\Notice;
use App\Player;
use App\coach;
use App\roadrace;
use App\uni;
use App\lodge;
use App\allocation;
use App\badminton;
use App\volleyball;
use App\netball;
use App\Table_Tennis;
use App\Baseball;




class AppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //View Notices
    public function ShowAllNotices()
    {
        $notices=DB::table('notices')->get();
        return response()->json($notices);
        
    }

    //View single notice
    public function ShowNotice($id){
        $notice = DB::table('notices')->where('NoticeID',$id)->pluck("Notice");

        return response()->json(["notice"=>$notice]);
      }

    //App Login
    public function AppLogin(Request $request,player $player)
    {
        $player=DB::table('Player')->where('NIC', $request->input('NIC'))->pluck("NIC");
        $coach=DB::table('Coach')->where('NIC', $request->input('NIC'))->pluck("NIC");

        if(($player=='[]') and ($coach=='[]')){
            return response()->json(["message"=>"failed"]);
        }
        else{
            return response()->json(["message"=>"ok"]); 
        }
       
    }

    //view Road Race Results
    public function ViewRoadRaceResult(){
        $result = DB::table('roadrace')->orderBy('Rank', 'asc')->get();
        return response()->json($result);
    }
   
    //get accomodation details
    public function ViewAccommodation(Request $request){
        $today = getdate();
        $nic=(DB::table('Player')->where('NIC', $request->input('NIC'))->pluck("NIC") or DB::table('Player')->where('NIC', $request->input('NIC'))->pluck("NIC"));
        
        $uni=DB::table('Player')->where('NIC',$nic)->pluck("UniID");
        
        $lodgeid=DB::table('allocations')->where('UniID',$uni)->where('Date',$today)->pluck("LodgeID");
        $lodge=lodge::where('LodgeId',$lodgeid)->pluck("LodgeName");

        return response()->json($result);
    }

    //view badminton results

    public function ViewBadminton(){
       
      $r = DB::table('badminton')
	        ->join('unis as a','badminton.Uni1','=','a.UniID')
            ->join('unis as b','badminton.Uni2','=','b.UniID1')
            ->select('a.UniName','a.LogoLink1','a.UniID','b.UniName1','b.LogoLinks2','b.UniID1','badminton.*')	    
            ->orderByRaw(DB::raw("FIELD(badminton.Round,'Finals','Consolation Finals','Semi Finals','Quarter Finals','Preliminary')"))
	    ->orderBy('badminton.Gender')
            ->get();
           
 	return response()->json($r);
   }


    //View Netball results
    public function netball(){
        $r = DB::table('netball')
	        ->join('unis as a','netball.Uni1','=','a.UniID')
            ->join('unis as b','netball.Uni2','=','b.UniID1')
            ->select('a.UniName','a.LogoLink1','a.UniID','b.UniName1','b.LogoLinks2','b.UniID1','netball.*')
            ->orderByRaw(DB::raw("FIELD(netball.Round,'Final','Consolation Finals','Semi-final','Quarter-final','Preliminary-Round')"))
            ->get();
           

 	return response()->json($r);
    }

     //View Volleyball results
     public function ViewVolleyball(){
       
       	 $r = DB::table('volleyball')
	        ->join('unis as a','volleyball.Uni1','=','a.UniID')
            ->join('unis as b','volleyball.Uni2','=','b.UniID1')
            ->select('a.UniName','a.LogoLink1','a.UniID','b.UniName1','b.LogoLinks2','b.UniID1','volleyball.*')
            ->orderByRaw(DB::raw("FIELD(volleyball.Round,'Final','Consolation Finals','Semi Finals','Quarter Finals','Preliminary')"))
	   ->orderBy('volleyball.Gender')
            ->get();
           

 	return response()->json($r);

    }

    //View TT Results
    public function ViewTTennis(){
       
         $r = DB::table('table_tennis')
	        ->join('unis as a','table_tennis.Uni1','=','a.UniID')
            ->join('unis as b','table_tennis.Uni2','=','b.UniID1')
            ->select('a.UniName','a.LogoLink1','a.UniID','b.UniName1','b.LogoLinks2','b.UniID1','table_tennis.*')
           ->orderByRaw(DB::raw("FIELD(table_tennis.Round,'Final','Consolation Finals','Semi-final','Quarter-final','Preliminary-Round')"))
	   ->orderBy('table_tennis.Gender')
            ->get();
         return response()->json($r);
    }

    //View Baseball results
    public function ViewBaseball(){
        
         $r = DB::table('baseball')
	        ->join('unis as a','baseball.Uni1','=','a.UniID')
            ->join('unis as b','baseball.Uni2','=','b.UniID1')
            ->select('a.UniName','a.LogoLink1','a.UniID','b.UniName1','b.LogoLinks2','b.UniID1','baseball.*')
            ->orderByRaw(DB::raw("FIELD(baseball.Round,'Final','Consolation Finals','Semi-final','Quarter-final','Preliminary-Round')"))
            ->get();
 	return response()->json($r);
    }


    //View Basketball results
    public function ViewBasketball(){
        
        $r = DB::table('basketball')
	        ->join('unis as a','basketball.Uni1','=','a.UniID')
            ->join('unis as b','basketball.Uni2','=','b.UniID1')
            ->select('a.UniName','a.LogoLink1','a.UniID','b.UniName1','b.LogoLinks2','b.UniID1','basketball.*')
           ->orderByRaw(DB::raw("FIELD(basketball.Round,'Finals','Consolation Finals','Semi-final','Quarter-final','Preliminary-Round')"))
	    ->orderBy('basketball.Gender')
	   ->get();
 	return response()->json($r);
    }

	//View Cricket results
    public function ViewCricket(){
        
       $r = DB::table('cricket')
	    ->join('unis as a','cricket.Uni1','=','a.UniID')
            ->join('unis as b','cricket.Uni2','=','b.UniID1')
            ->select('a.UniName','a.LogoLink1','a.UniID','b.UniName1','b.LogoLinks2','b.UniID1','cricket.*')
            ->orderByRaw(DB::raw("FIELD(cricket.Round,'Final','Consolation Finals','Semi-final','Quarter-final','Preliminary-Round')"))            ->get();
 	return response()->json($r);
    }

 //View Football results
    public function ViewFootball(){
        
         $r = DB::table('football')
	        ->join('unis as a','football.Uni1','=','a.UniID')
            	->join('unis as b','football.Uni2','=','b.UniID1')
            	->select('a.UniName','a.LogoLink1','a.UniID','b.UniName1','b.LogoLinks2','b.UniID1','football.*')
           	->orderByRaw(DB::raw("FIELD(football.Round,'Final','Consolation Finals','Semi-final','Quarter-final','Preliminary-Round')"))
            	->get();
 	return response()->json($r);   
     }

 //View Rugby results
     public function ViewRugbyFootball(){
        
        $r = DB::table('rugbyfootball')
	        ->join('unis as a','rugbyfootball.Uni1','=','a.UniID')
            	->join('unis as b','rugbyfootball.Uni2','=','b.UniID1')
            	->select('a.UniName','a.LogoLink1','a.UniID','b.UniName1','b.LogoLinks2','b.UniID1','rugbyfootball.*')
           	->orderByRaw(DB::raw("FIELD(rugbyfootball.Round,'Final','Consolation Final','Semi Final','Quarter Final','Preliminary-Round')"))
            	->get();
 	return response()->json($r);     
  }

 //View runing results
    public function ViewRunning(){
        
        $result=DB::table('runningevents')
 	->join('unis as a','runningevents.Uni','=','a.UniID')
	->select('a.UniName','a.LogoLink1','a.UniID','runningevents.*')
	->where('runningevents.Round','Final')->whereIn('runningevents.Event',['100m','200m','400m','800m','1500m','5000m'])
	->orderByRaw(DB::raw("FIELD(runningevents.Event,'100m','200m','400m','800m','1500m','5000m')"))->orderBy('runningevents.Gender')
	->orderBy('runningevents.Rank')->get();

        return response()->json($result);
    }

 //View 100m runing results
    public function ViewRunningHundred(){
        
        $result=DB::table('runningevents')
	->where('Round','Final')->where('Event',"100m")
	->orderBy('Gender')->orderBy('Rank')->get();

        return response()->json($result);
    }

    //View 200m runing results
    public function ViewRunningTwoHundred(){
        
        $result=DB::table('runningevents')
	->where('Round','Final')->where('Event',"200m")
	->orderBy('Gender')->orderBy('Rank')->get();

        return response()->json($result);
    }

    //View 400m runing results
    public function ViewRunningFourHundred(){
        
        $result=DB::table('runningevents')
	->where('Round','Final')->where('Event',"400m")
	->orderBy('Gender')->orderBy('Rank')->get();

        return response()->json($result);
    }

    //View 800m runing results
    public function ViewRunningEightHundred(){
        
        $result=DB::table('runningevents')
	->where('Round','Final')->where('Event',"800m")
	->orderBy('Gender')->orderBy('Rank')->get();

        return response()->json($result);
    }

    //View 1500m runing results
    public function ViewRunningOneFiveHundred(){
        
        $result=DB::table('runningevents')
	->where('Round','Final')->where('Event',"1500m")
	->orderBy('Gender')->orderBy('Rank')->get();

        return response()->json($result);
    }

    //View 5000m runing results
    public function ViewRunningFiveThousand(){
        
        $result=DB::table('runningevents')
	->where('Round','Final')->where('Event',"5000m")
	->orderBy('Gender')->orderBy('Rank')->get();

        return response()->json($result);
    }

    //View 110m Hurdles runing results
    public function ViewRunningHundredTenHurdles(){
        
        $result=DB::table('runningevents')
	->where('Round','Final')->where('Event',"110m Hurdles")
	->orderBy('Gender')->orderBy('Rank')->get();

        return response()->json($result);
    }

    //View 400m hurdles runing results
    public function ViewRunningFourHundredHurdles(){
        
        $result=DB::table('runningevents')
	->where('Round','Final')->where('Event',"400m Hurdles")
	->orderBy('Gender')
	->orderBy('Rank')->get();

        return response()->json($result);
    }

    //View 4 X 100m relay hurdles runing results
    public function ViewRunningHundredRelay(){
        
        $result=DB::table('runningevents')
	->where('Round','Final')->where('Event',"4 x 100m Relay")
	->orderBy('Gender')
	->orderBy('Rank')->get();

        return response()->json($result);
    }

    //View 4 X 400m relay hurdles runing results
    public function ViewRunningFourHundredRelay(){
        
        $result=DB::table('runningevents')
	->where('Round','Final')->where('Event',"4 x 400m Relay")
	->orderBy('Gender')
	->orderBy('Rank')->get();

        return response()->json($result);
    }

    //View high jump results
    public function ViewHighJump(){
        
        $result=DB::table('jumpingevents')
	->join('unis as a','jumpingevents.Uni','=','a.UniID')
	->select('a.UniName','a.LogoLink1','a.UniID','jumpingevents.*')
	->where('jumpingevents.Round','Final')->where('jumpingevents.Event',"High Jump")
	->orderBy('jumpingevents.Gender')
	->orderBy('jumpingevents.Rank')->get();

        return response()->json($result);
    }

    //View long jump results
    public function ViewLongJump(){
        
        $result=DB::table('jumpingevents')
	->join('unis as a','jumpingevents.Uni','=','a.UniID')
	->select('a.UniName','a.LogoLink1','a.UniID','jumpingevents.*')
	->where('jumpingevents.Round','Final')->where('jumpingevents.Event',"Long Jump")
	->orderBy('jumpingevents.Gender')
	->orderBy('jumpingevents.Rank')->get();

        return response()->json($result);
    }

    //View triple jump results
    public function ViewTripleJump(){
        
        $result=DB::table('jumpingevents')
	->join('unis as a','jumpingevents.Uni','=','a.UniID')
	->select('a.UniName','a.LogoLink1','a.UniID','jumpingevents.*')
	->where('jumpingevents.Round','Final')->where('jumpingevents.Event',"Triple Jump")
	->orderBy('jumpingevents.Gender')
	->orderBy('jumpingevents.Rank')->get();

        return response()->json($result);
    }

    //View pole vault results
    public function ViewPoleVault(){
        
        $result=DB::table('jumpingevents')
	->join('unis as a','jumpingevents.Uni','=','a.UniID')
	->select('a.UniName','a.LogoLink1','a.UniID','jumpingevents.*')
	->where('jumpingevents.Round','Final')->where('jumpingevents.Event',"Pole Vault")
	->orderBy('jumpingevents.Gender')
	->orderBy('jumpingevents.Rank')->get();

        return response()->json($result);
    }

//View ShotPut 
    public function ViewShotPut(){
        
        $result=DB::table('throwingevents')
	->join('unis as a','throwingevents.Uni','=','a.UniID')
	->select('a.UniName','a.LogoLink1','a.UniID','throwingevents.*')
	->where('throwingevents.Round','Final')->where('throwingevents.Event',"Shot Put")
	->orderBy('throwingevents.Gender')
	->orderBy('throwingevents.Rank')->get();

        return response()->json($result);
    }

    //View Javelin Throw 
    public function ViewJavelinThrow(){
        
        $result=DB::table('throwingevents')
	->join('unis as a','throwingevents.Uni','=','a.UniID')
	->select('a.UniName','a.LogoLink1','a.UniID','throwingevents.*')
	->where('throwingevents.Round','Final')->where('throwingevents.Event',"Javelin Throw")
	->orderBy('throwingevents.Gender')
	->orderBy('throwingevents.Rank')->get();

        return response()->json($result);
    }

     //View Discus Throw 
     public function ViewDiscusThrow(){
        
        $result=DB::table('throwingevents')
	->join('unis as a','throwingevents.Uni','=','a.UniID')
	->select('a.UniName','a.LogoLink1','a.UniID','throwingevents.*')
	->where('throwingevents.Round','Final')->where('throwingevents.Event',"Discus Throw")
	->orderBy('throwingevents.Gender')
	->orderBy('throwingevents.Rank')
	->get();
        return response()->json($result);
    }

    //View schedule
    public function ViewSchedule(){
        
        $result=DB::table('schedule')->get();

        return response()->json($result);
    }
    //Get total points
    public function ViewPoints(){
        
       $r = DB::table('total')
	    ->join('unis as a','total.UniName','=','a.UniName')
            ->select('a.UniName','a.LogoLink1','a.UniName','total.*')
            ->orderBy('total.Total','desc')
            ->get();
 	return response()->json($r);  
       }

    //View Carrom
     public function ViewCarrom(){
        
        $r = DB::table('carrom')
	        ->join('unis as a','carrom.Uni1','=','a.UniID')
            ->join('unis as b','carrom.Uni2','=','b.UniID1')
            ->select('a.UniName','a.LogoLink1','a.UniID','b.UniName1','b.LogoLinks2','b.UniID1','carrom.*')
            ->orderByRaw(DB::raw("FIELD(carrom.Round,'Finals','Consolation Finals','Semi Finals','Quarter Finals','Preliminary')")) 
	    ->orderBy('carrom.Gender')       
            ->get();
 	return response()->json($r);       
    }

     //View Elle
     public function ViewElle(){
        
        $r = DB::table('elle')
	        ->join('unis as a','elle.Uni1','=','a.UniID')
            ->join('unis as b','elle.Uni2','=','b.UniID1')
            ->select('a.UniName','a.LogoLink1','a.UniID','b.UniName1','b.LogoLinks2','b.UniID1','elle.*')  
            ->orderByRaw(DB::raw("FIELD(elle.Round,'Final','Consolation Finals','Semi-final','Quarter-final','Preliminary-Round')"))
	    ->orderBy('elle.Gender')
            ->get();
 	return response()->json($r); 
    }

//View Hockey
    public function ViewHockey(){
        
        $r = DB::table('hockey')
	        ->join('unis as a','hockey.Uni1','=','a.UniID')
            ->join('unis as b','hockey.Uni2','=','b.UniID1')
            ->select('a.UniName','a.LogoLink1','a.UniID','b.UniName1','b.LogoLinks2','b.UniID1','hockey.*')
           ->orderByRaw(DB::raw("FIELD(hockey.Round,'Final','Consolation Finals','Semi-final','Quarter-final','Preliminary-Round')"))
            ->orderBy('hockey.Gender')
            ->get();
 	return response()->json($r);
    }

    //View Kata
    public function ViewKata(){
        
        $r = DB::table('karate_kata')
	        ->join('unis as a','karate_kata.Uni','=','a.UniID')
                ->select('a.UniName','a.LogoLink1','a.UniID','karate_kata.*')
            	->orderBy('karate_kata.Gender')
		->orderBy('karate_kata.Points','desc')
            	->get();
 	return response()->json($r);

    }

    //View Kumite
    public function ViewKumite(){
        
       $r = DB::table('karate_kumite')
	        ->join('unis as a','karate_kumite.Uni1','=','a.UniID')
            	->join('unis as b','karate_kumite.Uni2','=','b.UniID1')
            	->select('a.UniName','a.LogoLink1','a.UniID','b.UniName1','b.LogoLinks2','b.UniID1','karate_kumite.*')
        	->orderByRaw(DB::raw("FIELD(karate_kumite.Round,'Final','Consolation Finals','Semi-final','Quarter-final','Preliminary-Round')"))
            	->orderBy('karate_kumite.Gender')
		->get();
 	return response()->json($r);
    }

	 //View Rowing
    public function ViewRowing(){
        
      $r = DB::table('rowing')
	        ->join('unis as a','rowing.Uni','=','a.UniID')
                ->select('a.UniName','a.LogoLink1','a.UniID','rowing.*')
            	->orderBy('rowing.MatchCategory')
		->orderBy('rowing.Gender')
		->orderBy('rowing.Rank')
            	->get();
 	return response()->json($r);

    }

 //View Taekwondo
    public function ViewTaekwondo(){
        
        $result=DB::table('taekwondo')->orderBy('MatchNo','asc')->get();
        return response()->json($result);
    }
//View Wrestling
    public function ViewWrestling(){
        
        $r = DB::table('wrestling')
	    ->join('unis as a','wrestling.Uni1','=','a.UniID')
            ->join('unis as b','wrestling.Uni2','=','b.UniID1')
            ->select('a.UniName','a.LogoLink1','a.UniID','b.UniName1','b.LogoLinks2','b.UniID1','wrestling.*')
            ->orderByRaw(DB::raw("FIELD(wrestling.Round,'Final','Consolation Finals','Semi-final','Quarter-final','Preliminary-Round')"))
            ->get();
 	return response()->json($r);
    }

//View WeightLifting
    public function ViewWeightLifting(){
        
       $r = DB::table('weightlifting')
	        ->join('unis as a','weightlifting.Uni','=','a.UniID')
                ->select('a.UniName','a.LogoLink1','a.UniID','weightlifting.*')
            	->orderBy('weightlifting.WeightCategory')
		->orderBy('weightlifting.Gender')
		->orderByRaw(DB::raw("FIELD(weightlifting.Rank,'1','2','3','4','5','6','7','8','9','10','11','12')"))
            	->get();
 	return response()->json($r);
    }

//View Tennis
    public function ViewTennis(){
        
     	 $r = DB::table('tennis')
	        ->join('unis as a','tennis.Uni1','=','a.UniID')
            ->join('unis as b','tennis.Uni2','=','b.UniID1')
            ->select('a.UniName','a.LogoLink1','a.UniID','b.UniName1','b.LogoLinks2','b.UniID1','tennis.*')
           ->orderByRaw(DB::raw("FIELD(tennis.Round,'Finals','Consolation Finals','Semi Finals','Quarter Finals','Preliminary')"))
            ->orderBy('tennis.Gender')
            ->get();
 	return response()->json($r);

    }

 //View Swimming Individual
    public function ViewSwimmingIndividual(){
       $r = DB::table('swimming_individual')
	        ->join('unis as a','swimming_individual.Uni','=','a.UniID')
                ->select('a.UniName','a.LogoLink1','a.UniID','swimming_individual.*')
		->orderByRaw(DB::raw("FIELD(swimming_individual.Round,'Finals','Heats2','Heats1')"))
		->orderBy('swimming_individual.Event')
		->orderBy('swimming_individual.Gender')
		->orderBy('swimming_individual.Rank')
		
            	->get();
 	return response()->json($r);

    }

    //View Swimming Team
    public function ViewSwimmingTeam(){
        
        $r = DB::table('swimming_team')
	        ->join('unis as a','swimming_team.Uni','=','a.UniID')
                ->select('a.UniName','a.LogoLink1','a.UniID','swimming_team.*')
            	->orderByRaw(DB::raw("FIELD(swimming_team.Round,'Finals')"))
		->orderBy('swimming_team.Event')
		->orderBy('swimming_team.Gender')
		->orderBy('swimming_team.Rank')
            	->get();
 	return response()->json($r);
    }

    //View hurdles results
    public function ViewHurdles(){
            
        $result=DB::table('runningevents')
	->join('unis as a','runningevents.Uni','=','a.UniID')
	->select('a.UniName','a.LogoLink1','a.UniID','runningevents.*')
	->where('runningevents.Round','Final')->whereIn('runningevents.Event', ['110m Hurdles','400m Hurdles'])
	->orderByRaw(DB::raw("FIELD(runningevents.Event,'110m Hurdles','400m Hurdles')"))->orderBy('runningevents.Gender')
	->orderBy('runningevents.Rank')->get();

        return response()->json($result);
    }

    //View relay results
    public function ViewRelay(){
            
        $result=DB::table('runningevents_relay')
	->join('unis as a','runningevents_relay.Uni','=','a.UniID')
	->select('a.UniName','a.LogoLink1','a.UniID','runningevents_relay.*')
	->where('runningevents_relay.Round','Final')->whereIn('runningevents_relay.Event', ['4 x 100m Relay','4 x 400m Relay'])
	->orderByRaw(DB::raw("FIELD(runningevents_relay.Event,'4 x 100m Relay','4 x 400m Relay')"))->orderBy('runningevents_relay.Gender')
	->orderBy('runningevents_relay.Rank')
	->get();

        return response()->json($result);
    }

    //View chess results
   public function ViewChess(){
            
    $r = DB::table('chess')
	        ->join('unis as a','chess.Uni1','=','a.UniID')
            	->join('unis as b','chess.Uni2','=','b.UniID1')
            	->select('a.UniName','a.LogoLink1','a.UniID','b.UniName1','b.LogoLinks2','b.UniID1','chess.*')
            	->orderByRaw(DB::raw("FIELD(chess.Round,'First Round','Second Round','Third Round','Fourth Round','Fifth Round')"))
		->orderBy('chess.Gender')		
            	->get();
 	return response()->json($r);
    }

    //View taekwondo individual poomsae results
    public function ViewTaekwondoIndividualPoomsae(){
            
     $r = DB::table('taekwondo_individual_poomsae')
	        ->join('unis as a','taekwondo_individual_poomsae.Uni','=','a.UniID')
                ->select('a.UniName','a.LogoLink1','a.UniID','taekwondo_individual_poomsae.*')
            	->orderByRaw(DB::raw("FIELD(taekwondo_individual_poomsae.Round,'Final','Consolation Finals','Semi-final','Quarter-final','Preliminary-Round')"))
		->orderBy('taekwondo_individual_poomsae.Gender')
		->orderBy('taekwondo_individual_poomsae.Rank')
            	->get();
 	return response()->json($r);
	
    }

    //View taekwondo team poomsae results
    public function ViewTaekwondoTeamPoomsae(){
            
   $r = DB::table('taekwondo_team_poomsae')
	        ->join('unis as a','taekwondo_team_poomsae.Uni','=','a.UniID')
                ->select('a.UniName','a.LogoLink1','a.UniID','taekwondo_team_poomsae.*')
            	->orderByRaw(DB::raw("FIELD(taekwondo_team_poomsae.Round,'Final','Consolation Finals','Semi-final','Quarter-final','Preliminary-Round')"))
		->orderBy('taekwondo_team_poomsae.Gender')
		->orderBy('taekwondo_team_poomsae.Rank')
		->get();

 	return response()->json($r);

    }

    //View taekwondo sparring results
    public function ViewTaekwondoSparring(){
            
    $r = DB::table('taekwondo_sparring')
	    	->join('unis as a','taekwondo_sparring.Uni1','=','a.UniID')
            	->join('unis as b','taekwondo_sparring.Uni2','=','b.UniID1')
            	->select('a.UniName','a.LogoLink1','a.UniID','b.UniName1','b.LogoLinks2','b.UniID1','taekwondo_sparring.*')
           	->orderByRaw(DB::raw("FIELD(taekwondo_sparring.Round,'Final','Consolation Finals','Semi-final','Quarter-final','Preliminary-Round')"))
		->orderBy('taekwondo_sparring.Gender')
            	->get();
 	return response()->json($r);


    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
