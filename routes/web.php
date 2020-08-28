<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Support\Facades\Input;
use App\Player_Event;
use App\Event_uni;
use App\Elle;
use App\Football;

Route::get('/welcome',function(){
    return view('home.welcome1');
});
Route::get('/navibar',function(){
    return view('home.newNavbar');
});

//  Route::get('/baseballSchedule',function(){
//     $data=App\BaseballSchedule::all();
//     return view('schedule.baseballSchedule')->with('tasks',$data);
//  });

Route::get('/baseballSchedule','DynamicDependent@index');
Route::post('/baseballSchedule/fetch','DynamicDependent@fetch')->name('dynamicdependent.fetch');
Route::post('/saveBaseballSchedule','SportSchedule@BaseballSchedule');


Route::get('/sportGroups','DynamicDependent@index1');
Route::post('/sportGroups/fetch1','DynamicDependent@fetch1')->name('dynamicdependent1.fetch1');
//Route::get('/sportGroups','DynamicDependent@index2');

Route::get('/Youtube',function(){
    return view('home.youtubeapi');
});

Route::get('/',function(){
    return view('home.NewHome');
});
Route::get('/Map',function(){
    return view('GoogleMap.Map');
});
// Route::get('/login',function(){
//     return view('login');
// });
Route::get('/login1',function(){
    return view('login');
});
Route::post('/saveVolunteer','VolunteerController@storeVolunteer');


Route::get('/adminhome',function(){
    return view('AdminResultView.adminhome');
})->middleware('auth:officers');
Route::get('/logde',function(){
    return view('LodgeDataFeed');
});





/*Route::get('/NetBall',function(){
    $data=App\Net::all();

    return view('sportResults')->with('tasks',$data);
});*/
Route::get('/CricketResult',function(){
    return view('resultAdd.cricketResult');
});
Route::get('/BadmintonResult',function(){
    return view('resultAdd.BadmintonResult');
});

Route::get('/addresult',function(){
    return view('AllSportResult.AddResult');
})->middleware('auth:officers');


Route::get('/TrackField',function(){
    return view('AllSportResult.TrackField');
});
// Route::get('/Point',function(){
//     $groupNo = DB::table('sports__teams')
//                         ->groupBy('Sport')
//                         ->select('sports__teams.Sport')
//                         ->get();
//     $Points = DB::table('point__systems')
//                         ->groupBy('Teams14')
//                         ->select('point__systems.Teams14')->orderBy('point__systems.Teams14','ASC')
//                         ->get();
        
//     return view('AddPoint')->with('groupNo',$groupNo);
// });
// Route::post('/savePoint','addPointTable@savePoint');
//Route::get('/deletePoint/{ID}/{Place}/{Sport}','addPointTable@deletePoint');
//vollyball point
Route::get('/pointVollyball','addPointTable@pointVolly');


Route::get('/VolunteerTask',function(){
    $data=App\Volunteer_Task::all();
    return  view('Volunteer_Task')->with('tasks',$data);
});
Route::get('/Streams',function(){
    return view('home.Streams');
});
Route::get('/TotalPoint',function(){
    return view('home.Totalpoint');
});
Route::get('/TeamGames',function(){
    return view('home.TeamGames');
});
Route::get('/Teams',function (){
    return view('Sports_Teams');
});

Route::get('/Events',function(){
    $data=App\Player_Event::all();
    $groupNo = DB::table('sports__teams')
                        ->groupBy('Sport')
                        ->select('sports__teams.Sport')
                        ->get();
    return view('Events')->with('tasks',$data)->with('groupNo',$groupNo);
})->middleware('auth:officers');
//Events Routes
Route::post('/saveEvents','Sports@storeEvents');
Route::get('/updateEvent/{MatchNo}/{Sport}','Sports@UpdateEvent');
Route::post('/updateEventSchedule','Sports@UpdateEventSchedule');
Route::get('/deleteEventSchedule/{MatchNo}/{Sport}','Sports@DeleteEventSchedule'); 




// Route::get('/eventSchedule',function(){
//     return view('home.EventSchedule');
// });
Route::get('/pointVollyball',function(){
    return view('home.VollyBall');
});
Route::get('/pointNetBall',function(){
    return view('home.NetBall');
});
Route::get('/pointFootball',function(){
    return view('home.Football');
});
Route::get('/pointBasketball',function(){
    return view('home.BasketBall');
});
Route::get('/pointBaseball',function(){
    return view('home.BaseBall');
});
//volunteer datails add excel sheet
Route::get('/import_officers','ImportExcelController@index1');
Route::post('/import_officers/officers','ImportExcelController@officersAdd');

Route::get('/import_points','addPointTable@index');
Route::post('/import_points/points','addPointTable@import');

Route::get('total/{UniID}','addPointTable@MensPoint');

Route::get('/netballResult','JointTableResult@index');



Route::get('/vollyBallResult','JointTableResult@index1');

//Route::get('/pointVollyball','addPointTable@pointVollyWomen');

//NetBall Point
Route::get('/pointNetBall','addPointTable@pointnetball');
//football Point
Route::get('/pointFootball','addPointTable@pointfootball');
//basketball Point
Route::get('/pointBasketball','addPointTable@pointbasketball');
//Baseball point
Route::get('/pointBaseball','addPointTable@pointbaseball');
//Route::get('/exel_export','ExelExportController@index');
//Route::get('/exel_export/exel','ExelExportController@excel')->name('Export_PlayerData.excel');

//player details add excel sheet
Route::get('/import_excel','ImportExcelController@index');
Route::post('/import_excel/import','ImportExcelController@import');


//sport Result Add Update and Delete
//Route::get('/deleteTask/{EventID}','Sports@delete');
Route::post('/saveSports','Sports@storeSports');
Route::post('/UpdateSports','Sports@UpdateSports');
Route::get('/updatetask/{EventID}/{UniID}','Sports@UpdateTaskView');
Route::get('/deletetask/{EventID}/{UniID}','Sports@deleteTask');

//Sports Teams Route

Route::post('/saveSports','Sports@storeSportsTeams');


Route::get('/Ongoing','ResultController@OnGoingGames');
Route::get('/AddOngoingGames','AddAllSportsResult@AddOngoingGames');
Route::post('/saveOngoingGames','AddAllSportsResult@SaveOngoingGames');
Route::post('/updateResult','AddAllSportsResult@updateResult');


//vounteer task
//Volunteer Task Add Update and Delete
Route::post('/saveVolunteerTask','VolunteerTask@vTask');
Route::post('/UpdateVolunteer','VolunteerTask@UpdateVolunteer');
Route::get('/UpdateVolunteerTask/{VolunteerID}','VolunteerTask@UpdateVolunteerTask');
Route::get('/DeleteVolunteerTask/{VolunteerID}','VolunteerTask@DeleteVolunteerTask');



// Route::get('/eventSchedule','JointTableResult@index2');
Route::get('/eventSchedule','JointTableResult@Schedule');
Route::post('/searchSchedule','JointTableResult@SearchSchedule');
//search events
Route::post('/search',function(){
        $q=Input::get('search');
        if($q!=""){
            $data=DB::table('player__events')
                    ->join('unis as a','a.UniID','=','player__events.Uni1')
                    ->join('unis as b','b.UniID1','=','player__events.Uni2')
                    ->Where('player__events.Sport','Like','%' . $q .'%')
                    ->orWhere('player__events.Date','Like','%' . $q .'%')
                    ->select('a.UniName','a.Image','a.UniID','b.UniName1','b.Image1','b.UniID1','player__events.*')
                    ->orderBy('player__events.MatchNo','desc')
                    ->get();
            if(count($data)>0){
                return view('schedule.EventSchedule')->with('data',$data);
            }
        }
        return view('schedule.EventSchedule')->withMessage('No data founds');
});



Route::get('/BaseballGroup',function(){
    $data=App\BaseballMen_Groups::all();
    return view('SportGroups.baseballGroupAdd')->with('tasks',$data);
});
Route::post('/saveBaseballGroup','SportGroupAdd@baseballGroup');



Route::get('/Notices',function(){
    $data = Notices::all();
    return view('Notices.notices')->with('tasks',$data);
})->middleware('auth:officers');

Route::get('/addNotices',function(){
    $data = App\Notices::all();
    return view('Notices.addNotices')->with('tasks',$data);
});
Route::post('/saveNotice','SportNotices@saveNotice');
Route::get('/Notices','SportNotices@getNotices');
Route::get('/deleteNotice/{NoticeID}','SportNotices@deleteNotices');
Route::post('/UpdateNotice','SportNotices@UpdateNotice');
Route::get('/updateNoticeView/{NoticeID}','SportNotices@UpdateNoticeView');




Route::get('/chess',function(){
    $data=App\Chess::all();
    // $player=DB::table('player__sports')
    //                 ->join('players','player__sports.PlayerID','=','players.PlayerID')
    //                 ->where('player__sports.Sport','Chess')
    //                 //->where('players.UniID',$request->Uni1)
    //                 ->select('Players.Name')
    //                 ->get();
    return view('AllSportResult.chessResult',compact('player'))->with('tasks',$data);
});
Route::post('/saveChessResult','AddAllSportsResult@saveChessResult');
Route::get('deleteChessResult/{MatchNo}/{Round}','AddAllSportsResult@deleteChessResult');

Route::get('elle',function(){
    $data = Elle::all();
    return view('AllSportResult.elleResult')->with('tasks',$data);
});
Route::post('saveElleResult','AddAllSportsResult@saveElleResult');
Route::get('/deleteElleResult/{MatchNo}/{Gender}','AddAllSportsResult@deleteElleResult');
Route::post('/UpdateElleResult','AddAllSportsResult@UpdateElleResult');
Route::get('/updateElleView/{MatchNo}/{Gender}','AddAllSportsResult@UpdateElleView');



Route::get('football',function(){
    $data = App\FootBall::all();
    return view('AllSportResult.football')->with('tasks',$data);
});
Route::post('saveFootballResult','AddAllSportsResult@saveFootballResult');
Route::get('deleteFootballResult/{MatchNo}','AddAllSportsResult@deleteFootballResult');
Route::post('/UpdateFootballResult','AddAllSportsResult@UpdateFootballResult');
Route::get('/updateFootballView/{MatchNo}','AddAllSportsResult@UpdateFootballView');



Route::get('hockey',function(){
    $data=App\Hockey::all();
    return view('AllSportResult.hockey')->with('tasks',$data);
});
Route::post('/saveHockeyResult','AddAllSportsResult@saveHockeyResult');
Route::get('/deleteHockeyResult/{MatchNo}/{Gender}','AddAllSportsResult@deleteHockeyResult');
Route::post('/UpdateHockeyResult','AddAllSportsResult@UpdateHockeyResult');
Route::get('/updateHockeyView/{MatchNo}/{Gender}','AddAllSportsResult@UpdateHockeyView');


Route::get('/baseball',function(){
    $data=App\Baseball::all();
    return view('AllSportResult.baseball')->with('tasks',$data);
});
Route::post('saveBaseballResult','AddAllSportsResult@saveBaseballResult');
Route::get('deleteBaseballResult/{MatchNo}','AddAllSportsResult@deleteBaseballResult');
Route::post('/updateBaseballResult','AddAllSportsResult@UpdateBaseballResult');
Route::get('/updateBaseballView/{MatchNo}','AddAllSportsResult@UpdateBaseballView');


Route::get('/basketball',function(){
    $data=App\Basketball::all();
    return view('AllSportResult.basketball')->with('tasks',$data);
});
Route::post('/saveBasketballResult','AddAllSportsResult@saveBasketballResult');
Route::get('/deleteBasketballResult/{MatchNo}/{Gender}','AddAllSportsResult@deleteBasketballResult');
Route::post('/updateBasketballResult','AddAllSportsResult@UpdateBasketballResult');
Route::get('/updateBasketballView/{MatchNo}/{Gender}','AddAllSportsResult@UpdateBasketballView');

Route::get('/netball',function(){
    $data=App\Netball::all();
    return view('AllSportResult.Netball')->with('tasks',$data);
});
Route::post('/saveNetballResult','AddAllSportsResult@saveNetballResult');
Route::get('/deleteNetballResult/{MatchNo}','AddAllSportsResult@deleteNetballResult');
Route::post('/updateNetballResult','AddAllSportsResult@UpdateNetballResult');
Route::get('/updateNetballView/{MatchNo}','AddAllSportsResult@UpdateNetballView');


Route::get('/badmintonGames',function(){
    $data=App\BadmintonGames::all();
	$player=DB::table('players')
                ->where('Sport','Badminton')
                //->where('players.UniID',$request->Uni1)
                ->select('Name')
                ->orderBy('Name','asc')
                ->get();
    return view('AllSportResult.badmintonGames',compact('player'))->with('tasks',$data);
});
Route::post('/saveBadmintonGamesResult','AddAllSportsResult@saveBadmintonGamesResult');
Route::get('/deleteBadmintonGamesResult/{MatchNo}/{Gender}/{MatchCategory}','AddAllSportsResult@deleteBadmintonGamesResult');
Route::get('/updateBadmintonGamesView/{MatchNo}/{Gender}/{MatchCategory}','AddAllSportsResult@UpdateBadmintonGamesView');


Route::get('/badminton',function(){
    $data=App\Badminton::all();
    return view('AllSportResult.badminton')->with('tasks',$data)->with('msg','result insert successfully');
});
Route::post('/saveBadmintonResult','AddAllSportsResult@saveBadmintonResult');
Route::get('/deleteBadmintonResult/{MatchNo}/{Gender}','AddAllSportsResult@deleteBadmintonResult');


Route::get('/roadrace',function(){
    $data=App\RoadRace::all();
	$player=DB::table('players')
                ->where('Sport','road race')
                //->where('players.UniID',$request->Uni1)
                ->select('Name')
                ->orderBy('Name','asc')
                ->get();
    return view('AllSportResult.roadrace',compact('player'))->with('tasks',$data);
});
Route::post('/saveRoadraceResult','AddAllSportsResult@saveRoadRaceResult');
Route::get('/deleteRoadraceResult/{Uni}/{PlayerName}','AddAllSportsResult@deleteRoadraceResult');



Route::get('/rowing',function(){
    $uniID=DB::table('unis')->where('UniID','=','MOR')
                ->orWhere('UniID','=','COL')
                ->select('UniID')
                ->get();
	 $player=DB::table('players')
                ->where('Sport','rowing')
                //->where('players.UniID',$request->Uni1)
                ->select('Name')
                ->orderBy('Name','asc')
                ->get();
    $data=App\Rowing::all();
    return view('AllSportResult.rowing',compact('player'))->with('tasks',$data)->with('uniID',$uniID);
});


//Insert Sports Result Data Route

Route::post('/saveRowingResult','AddAllSportsResult@saveRowingResult');
Route::get('/deleteRowingResult/{Gender}/{Uni}/{MatchNo}','AddAllSportsResult@deleteRowingResult');

Route::get('/volleyball',function(){
    $data=App\Volleyball::all();
    return view('AllSportResult.vollyball')->with('tasks',$data);
});
Route::post('/saveVolleyballResult','AddAllSportsResult@saveVolleyballResult');
Route::get('/deleteVolleyballResult/{MatchNo}/{Gender}/{Uni1}/{Uni2}','AddAllSportsResult@deleteVolleyballResult');


Route::get('/volleyballgames',function(){
    $data=App\VolleyballGames::all();
    return view('AllSportResult.volleyballGames')->with('tasks',$data);
});
Route::post('/saveVolleyballGamesResult','AddAllSportsResult@saveVolleyballGamesResult');
Route::get('/deleteVolleyballGamesResult/{Gender}/{MatchNo}/{MatchCategory}','AddAllSportsResult@deleteVolleyballGamesResult');


Route::get('/wrestling',function(){
    $data=App\Wrestling::all();
	$player=DB::table('players')
        ->where('Sport','wrestling')
        //->where('players.UniID',$request->Uni1)
        ->select('Name')
        ->orderBy('Name','asc')
        ->get();
    return view('AllSportResult.wrestling',compact('player'))->with('tasks',$data);
});
Route::post('/saveWrestlingResult','AddAllSportsResult@saveWrestlingResult');
Route::get('/deleteWrestlingResult/{MatchNo}','AddAllSportsResult@deleteWrestlingResult');



Route::get('/weightLifting',function(){
    $data=App\Weightlifting::all();
	$player=DB::table('players')
        ->where('Sport','weightlifting')
        //->where('players.UniID',$request->Uni1)
        ->select('Name')
        ->orderBy('Name','asc')
        ->get();
    return view('AllSportResult.weightLifting',compact('player'))->with('tasks',$data);
});
Route::post('/saveWeightLiftingResult','AddAllSportsResult@saveWeightLiftingResult');
Route::get('/deleteWeightLiftingResult/{Uni}/{PlayerName}','AddAllSportsResult@deleteWeightLiftingResult');

Route::get('/cricket','AddAllSportsResult@viewCricketResult');
Route::post('/saveCricketResult','AddAllSportsResult@saveCricketResult');
Route::get('/deleteCricketResult/{MatchNo}','AddAllSportsResult@deleteCricketResult');

Route::get('/TableTennisGames','AddAllSportsResult@viewTableTennisGamesResult');
Route::post('/saveTableTennisGamesResult','AddAllSportsResult@saveTableTennisGamesResult');
Route::get('/deleteTableTennisGamesResult/{Gender}/{MatchNo}/{MatchCategory}','AddAllSportsResult@deleteTableTennisGamesResult');
Route::post('/TableTennisGames/fetch', 'AddAllSportsResult@fetch')->name('autocomplete.fetch');
//Route::post('/TableTennisGames/fetch1', 'AddAllSportsResult@fetch1')->name('autocomplete.fetch1');



Route::get('/TableTennis','AddAllSportsResult@viewTableTennisResult');
Route::post('/saveTableTennisResult','AddAllSportsResult@saveTableTennisResult');
Route::get('/deleteTableTennisResult/{Gender}/{MatchNo}','AddAllSportsResult@deleteTableTennisResult');

Route::get('/rugbyFootball','AddAllSportsResult@viewRugbyFootballResult');
Route::post('/saveRugbyFootballResult','AddAllSportsResult@saveRugbyFootballResult');
Route::get('/deleterugbyFootballResult/{MatchNo}','AddAllSportsResult@deleteRugbyFootballResult');

Route::get('/Swimming','AddAllSportsResult@viewSwimmingResult');
Route::post('/saveSwimmingResult','AddAllSportsResult@saveSwimmingResult');
Route::get('/deleteSwimmingResult/{MatchNo}/{Event}/{Round}/{Uni}/{PlayerName}','AddAllSportsResult@deleteSwimmingResult');

Route::get('/SwimmingTeam','AddAllSportsResult@viewSwimmingTeamResult');
Route::post('/saveSwimmingTeamResult','AddAllSportsResult@saveSwimmingTeamResult');
Route::get('/deleteSwimmingTeamResult/{MatchNo}/{Event}/{Round}/{Uni}','AddAllSportsResult@deleteSwimmingTeamResult');



Route::get('/KarateKata','AddAllSportsResult@viewKarateKataResult');
Route::post('/saveKarateKataResult','AddAllSportsResult@saveKarateKataResult');
Route::get('/deleteKarateKataResult/{MatchNo}/{Gender}/{Team_Individual}','AddAllSportsResult@deleteKarateKataResult');

Route::get('/KarateKumite','AddAllSportsResult@viewKarateKumiteResult');
Route::post('/saveKarateKumiteResult','AddAllSportsResult@saveKarateKumiteResult');
Route::get('/deleteKarateKumiteResult/{MatchNo}/{Gender}/{Uni1_Player}','AddAllSportsResult@deleteKarateKumiteResult');

Route::get('/Running','AddAllSportsResult@viewRunningResult');
Route::post('/saveRunningResult','AddAllSportsResult@saveRunningResult');
Route::get('/deleteRunningResult/{Gender}/{Event}/{MatchNo}/{Uni}/{PlayerName}','AddAllSportsResult@deleteRunningResult');


Route::get('/Jumping','AddAllSportsResult@viewJumpingResult');
Route::post('/saveJumpingResult','AddAllSportsResult@saveJumpingResult');
Route::get('/deleteJumpingResult/{Gender}/{Event}/{MatchNo}/{Uni}/{PlayerName}','AddAllSportsResult@deleteJumpingResult');


Route::get('/Throwing','AddAllSportsResult@viewThrowingResult');
Route::post('/saveThrowingResult','AddAllSportsResult@saveThrowingResult');
Route::get('/deleteThrowingResult/{Gender}/{Event}/{MatchNo}/{Uni}/{PlayerName}','AddAllSportsResult@deleteThrowingResult');


Route::get('/carrom','AddAllSportsResult@viewCarromResult');
Route::post('/saveCarromResult','AddAllSportsResult@saveCarromResult');
Route::get('/deleteCarromResult/{Gender}/{MatchNo}','AddAllSportsResult@deleteCarromResult');


Route::get('/tennis','AddAllSportsResult@viewTennisResult');
Route::post('/saveTennisResult','AddAllSportsResult@saveTennisResult');
Route::get('/deleteTennisResult/{Gender}/{MatchNo}','AddAllSportsResult@deleteTennisResult');


Route::get('/Select',[

    'uses'=>'ResultController@Select',
    'as'=>'Select'
    
    ]);
Route::post('/View',[

        'uses'=>'ResultController@View',
        'as'=>'View'

    ]);

//Admin Result View and PDF Generate    

Route::get('/Points','ResultController@Points');
Route::post('/Sort','ResultController@Sort');
Route::post('/SavePDF','ResultController@DownloadPDF');
Route::post('/SavePDF2','ResultController@DownloadPDF2');
Route::post('/ViewBadmintonDetails','ResultController@BadmintonView');
Route::post('/ViewTableTennisDetails','ResultController@TableTennisView');
Route::post('/ViewTrackAndFieldResults','ResultController@ViewTrackAndFieldResults');


//Sport Result Route And Search Result

Route::get('/badmintonresult','ResultController@badminton');
Route::get('/badmintonresult/{MatchNo}','ResultController@badmintonGamesResult');
Route::post('/search1',function(){
     $q=Input::get('search');
     if($q!=""){
        $r = DB::table('badminton')
        ->join('unis as a','badminton.Uni1','=','a.UniID')
        ->join('unis as b','badminton.Uni2','=','b.UniID1')
        ->Where('badminton.MatchNo','Like','%' . $q .'%')
        ->orWhere('badminton.Round','Like','%' . $q .'%')
        ->orWhere('badminton.Date','Like','%' . $q .'%')
        ->select('a.UniName','a.Image','a.UniID','b.UniName1','b.Image1','b.UniID1','badminton.*')
        ->orderBy('badminton.MatchNo','desc')
        ->get();

         if(count($r)>0){
             return view('SportResultView.Badminton',compact('r'));
         }
     }
     return view('SportResultView.Badminton')->withMessage('No data founds');
 });
 



Route::get('volleyballresult','ResultController@volleyball');
Route::get('/volleyballresult/{MatchNo}','ResultController@VoolleyballGamesResult');
Route::post('/search10',function(){
    $q=Input::get('search');
    if($q!=""){
        $r = DB::table('volleyball')
        ->join('unis as a','volleyball.Uni1','=','a.UniID')
        ->join('unis as b','volleyball.Uni2','=','b.UniID1')
        ->Where('volleyball.MatchNo','Like','%' . $q .'%')
        ->orWhere('volleyball.Round','Like','%' . $q .'%')
        ->orWhere('volleyball.Date','Like','%' . $q .'%')
        ->select('a.UniName','a.Image','a.UniID','b.UniName1','b.Image1','b.UniID1','volleyball.*')
        ->orderBy('volleyball.MatchNo','desc')
        ->get();


        if(count($r)>0){
            return view('SportResultView.Volleyball',compact('r'));
        }
    }
    return view('SportResultView.Volleyball')->withMessage('No data founds');
});

Route::get('tabletennis','ResultController@tabletennis');
Route::get('/tabletennis/{MatchNo}','ResultController@TableTennisGamesResult');

Route::post('/search11',function(){
    $q=Input::get('search');
    if($q!=""){
        $r = DB::table('table_tennis')
        ->join('unis as a','table_tennis.Uni1','=','a.UniID')
        ->join('unis as b','table_tennis.Uni2','=','b.UniID1')
        ->Where('table_tennis.MatchNo','Like','%' . $q .'%')
        ->orWhere('table_tennis.Round','Like','%' . $q .'%')
        ->orWhere('table_tennis.Date','Like','%' . $q .'%')
        ->select('a.UniName','a.Image','a.UniID','b.UniName1','b.Image1','b.UniID1','table_tennis.*')
        ->orderBy('table_tennis.MatchNo','desc')
        ->get();

        if(count($r)>0){
            return view('SportResultView.Table_Tennis',compact('r'));
        }
    }
    return view('SportResultView.Table_Tennis')->withMessage('No data founds');
});

Route::get('/basketballresult','ResultController@basketball');
Route::post('/search9',function(){
    $q=Input::get('search');
    if($q!=""){
        $r = DB::table('basketball')
        ->join('unis as a','basketball.Uni1','=','a.UniID')
        ->join('unis as b','basketball.Uni2','=','b.UniID1')
        ->Where('basketball.MatchNo','Like','%' . $q .'%')
        ->orWhere('basketball.Round','Like','%' . $q .'%')
        ->orWhere('basketball.Date','Like','%' . $q .'%')
        ->select('a.UniName','a.Image','a.UniID','b.UniName1','b.Image1','b.UniID1','basketball.*')
        ->orderBy('basketball.MatchNo','desc')
        ->get();

        if(count($r)>0){
            return view('SportResultView.Basketball',compact('r'));
        }
    }
    return view('SportResultView.Basketball')->withMessage('No data founds');
});

Route::get('/netballresult','ResultController@netball');
Route::post('/search8',function(){
    $q=Input::get('search');
    if($q!=""){
        $r = DB::table('netball')
        ->join('unis as a','netball.Uni1','=','a.UniID')
        ->join('unis as b','netball.Uni2','=','b.UniID1')
        ->Where('netball.MatchNo','Like','%' . $q .'%')
        ->orWhere('netball.Round','Like','%' . $q .'%')
        ->orWhere('netball.Date','Like','%' . $q .'%')
        ->select('a.UniName','a.Image','a.UniID','b.UniName1','b.Image1','b.UniID1','netball.*')
        ->orderBy('netball.MatchNo','desc')
        ->get();

        if(count($r)>0){
            return view('SportResultView.Netball',compact('r'));
        }
    }
    return view('SportResultView.Netball')->withMessage('No data founds');
});


Route::get('/hockeyresult','ResultController@hockey');
Route::post('/search7',function(){
    $q=Input::get('search');
    if($q!=""){
        $r = DB::table('hockey')
        ->join('unis as a','hockey.Uni1','=','a.UniID')
        ->join('unis as b','hockey.Uni2','=','b.UniID1')
        ->Where('hockey.MatchNo','Like','%' . $q .'%')
        ->orWhere('hockey.Round','Like','%' . $q .'%')
        ->orWhere('hockey.Date','Like','%' . $q .'%')
        ->select('a.UniName','a.Image','a.UniID','b.UniName1','b.Image1','b.UniID1','hockey.*')
        ->orderBy('hockey.MatchNo','desc')
        ->get();

        if(count($r)>0){
            return view('SportResultView.Hockey',compact('r'));
        }
    }
    return view('SportResultView.Hockey')->withMessage('No data founds');
});


Route::get('/baseballresult','ResultController@baseball');
Route::post('/search2',function(){
    $q=Input::get('search');
    if($q!=""){
        $r = DB::table('baseball')
        ->join('unis as a','baseball.Uni1','=','a.UniID')
        ->join('unis as b','baseball.Uni2','=','b.UniID1')
        ->Where('baseball.MatchNo','Like','%' . $q .'%')
        ->orWhere('baseball.Round','Like','%' . $q .'%')
        ->orWhere('baseball.Date','Like','%' . $q .'%')
        ->select('a.UniName','a.Image','a.UniID','b.UniName1','b.Image1','b.UniID1','baseball.*')
        ->orderBy('baseball.MatchNo','desc')
        ->get();

        if(count($r)>0){
            return view('SportResultView.Baseball',compact('r'));
        }
    }
    return view('SportResultView.Baseball')->withMessage('No data founds');
});


Route::get('/cricketresult','ResultController@cricket');
Route::post('/search3',function(){
    $q=Input::get('search');
    if($q!=""){
        $r = DB::table('cricket')
        ->join('unis as a','cricket.Uni1','=','a.UniID')
        ->join('unis as b','cricket.Uni2','=','b.UniID1')
        ->Where('cricket.MatchNo','Like','%' . $q .'%')
        ->orWhere('cricket.Round','Like','%' . $q .'%')
        ->orWhere('cricket.Date','Like','%' . $q .'%')
        ->select('a.UniName','a.Image','a.UniID','b.UniName1','b.Image1','b.UniID1','cricket.*')
        ->orderBy('cricket.MatchNo','desc')
        ->get();
            
        if(count($r)>0){
            return view('SportResultView.Cricket',compact('r'));
        }
    }
    return view('SportResultView.Cricket')->withMessage('No data founds');
});



Route::get('/rugbyresult','ResultController@rugby');
Route::post('/search6',function(){
    $q=Input::get('search');
    if($q!=""){
        $r = DB::table('rugbyfootball')
        ->join('unis as a','rugbyfootball.Uni1','=','a.UniID')
        ->join('unis as b','rugbyfootball.Uni2','=','b.UniID1')
        ->Where('rugbyfootball.MatchNo','Like','%' . $q .'%')
        ->orWhere('rugbyfootball.Round','Like','%' . $q .'%')
        ->orWhere('rugbyfootball.Date','Like','%' . $q .'%')
        ->select('a.UniName','a.Image','a.UniID','b.UniName1','b.Image1','b.UniID1','rugbyfootball.*')
        ->orderBy('rugbyfootball.MatchNo','desc')
        ->get();

        if(count($r)>0){
            return view('SportResultView.RugbyFootball',compact('r'));
        }
    }
    return view('SportResultView.RugbyFootball')->withMessage('No data founds');
});


Route::get('/tennisresult','ResultController@tennis');
Route::post('/search18',function(){
    $q=Input::get('search');
    if($q!=""){
       $r = DB::table('tennis')
       ->join('unis as a','tennis.Uni1','=','a.UniID')
       ->join('unis as b','tennis.Uni2','=','b.UniID1')
       ->Where('tennis.MatchNo','Like','%' . $q .'%')
       ->orWhere('tennis.Round','Like','%' . $q .'%')
       ->orWhere('tennis.Date','Like','%' . $q .'%')
       ->select('a.UniName','a.Image','a.UniID','b.UniName1','b.Image1','b.UniID1','tennis.*')
       ->orderBy('tennis.MatchNo','desc')
       ->get();

        if(count($r)>0){
            return view('SportResultView.Tennis',compact('r'));
        }
    }
    return view('SportResultView.Tennis')->withMessage('No data founds');
});




Route::get('/elleresult','ResultController@elle');
Route::post('/search5',function(){
    $q=Input::get('search');
    if($q!=""){
        $r = DB::table('elle')
        ->join('unis as a','elle.Uni1','=','a.UniID')
        ->join('unis as b','elle.Uni2','=','b.UniID1')
        ->Where('elle.MatchNo','Like','%' . $q .'%')
        ->orWhere('elle.Round','Like','%' . $q .'%')
        ->select('a.UniName','a.Image','a.UniID','b.UniName1','b.Image1','b.UniID1','elle.*')
        ->orderBy('elle.MatchNo','desc')
        ->get();

        if(count($r)>0){
            return view('SportResultView.Elle',compact('r'));
        }
    }
    return view('SportResultView.Elle')->withMessage('No data founds');
});

Route::get('/MensTotal','ResultController@menstotal');
Route::get('/WomensTotal','ResultController@womenstotal');
Route::get('/Total','ResultController@total');

Route::post('/SaveFeedback','ResultController@feedback');
Route::get('/Schedule1','JointTableResult@Schedule1');


Route::get('/footballresult','ResultController@football');
Route::post('/search4',function(){
    $q=Input::get('search');
    if($q!=""){
        $r = DB::table('football')
        ->join('unis as a','football.Uni1','=','a.UniID')
        ->join('unis as b','football.Uni2','=','b.UniID1')
        ->Where('football.MatchNo','Like','%' . $q .'%')
        ->orWhere('football.Round','Like','%' . $q .'%')
        ->orWhere('football.Date','Like','%' . $q .'%')
        ->select('a.UniName','a.Image','a.UniID','b.UniName1','b.Image1','b.UniID1','football.*')
        ->orderBy('football.MatchNo','desc')
        ->get();

        if(count($r)>0){
            return view('SportResultView.Football',compact('r'));
        }
    }
    return view('SportResultView.Football')->withMessage('No data founds');
});


Route::get('/wrestlingresult','ResultController@wrestling');
Route::post('/wrestling1','ResultController@wrestlingresult');


Route::get('/karatekumiteresult','ResultController@karatefinalkumite');
//Route::post('/karatekumite','ResultController@karate_kumiteresult');

Route::get('/karatekataresult','ResultController@karatekata');
Route::post('/kataresult','ResultController@karatekataresult');

// Route::post('/search16',function(){
//     $q=Input::get('search');
//     if($q!=""){
//         $r = DB::table('wrestling')
//         ->join('unis as a','wrestling.Uni1','=','a.UniID')
//         ->join('unis as b','wrestling.Uni2','=','b.UniID1')
//         ->Where('wrestling.MatchNo','Like','%' . $q .'%')
//         ->orWhere('wrestling.Round','Like','%' . $q .'%')
//         ->orWhere('wrestling.Date','Like','%' . $q .'%')
//         ->select('a.UniName','a.Image','a.UniID','b.UniName1','b.Image1','b.UniID1','wrestling.*')
//         ->orderBy('wrestling.MatchNo','desc')
//         ->get();

//         if(count($r)>0){
//             return view('SportResultView.wrestling',compact('r'));
//         }
//     }
//     return view('SportResultView.wrestling')->withMessage('No data founds');
// });

Route::get('/carromresult','ResultController@carrom');
Route::post('/search17',function(){
    $q=Input::get('search');
    if($q!=""){
        $r=DB::table('carrom')
            ->join('unis as a','carrom.Uni1','=','a.UniID')
            ->join('unis as b','carrom.Uni2','=','b.UniID1')
            ->Where('carrom.MatchNo','Like','%' . $q .'%')
            ->orWhere('carrom.Uni1','Like','%' . $q .'%')
            ->orWhere('carrom.Uni2','Like','%' . $q .'%')
            ->orWhere('carrom.Date','Like','%' . $q .'%')
            //->where(['weightlifting.Uni'=>'unis.UniID'])
            ->select('a.UniName','a.Image','a.UniID','b.UniName1','b.Image1','b.UniID1','carrom.*')
            ->orderBy('carrom.MatchNo','acs')
            ->get();

        if(count($r)>0){
            return view('SportResultView.Carrom',compact('r'));
        }
    }
    return view('SportResultView.Carrom')->withMessage('No data founds');
});




Route::get('/chessresult','ResultController@chess');
Route::post('/search20',function(){
    $q=Input::get('search');
    if($q!=""){
        $r=DB::table('chess')
            ->join('unis as a','chess.Uni1','=','a.UniID')
            ->join('unis as b','chess.Uni2','=','b.UniID1')
            ->Where('chess.MatchNo','Like','%' . $q .'%')
            ->orWhere('chess.Uni1','Like','%' . $q .'%')
            ->orWhere('chess.Uni2','Like','%' . $q .'%')
            ->orWhere('chess.Date','Like','%' . $q .'%')
            //->where(['weightlifting.Uni'=>'unis.UniID'])
            ->select('a.UniName','a.Image','a.UniID','b.UniName1','b.Image1','b.UniID1','chess.*')
            ->orderBy('chess.MatchNo','acs')
            ->get();

        if(count($r)>0){
            return view('SportResultView.chess',compact('r'));
        }
    }
    return view('SportResultView.chess')->withMessage('No data founds');
});



Route::get('/roadraceresult','ResultController@roadrace');
Route::post('/search19',function(){
    $q=Input::get('search');
    if($q!=""){
        $r=DB::table('roadrace')
            ->join('unis as a','roadrace.Uni','=','a.UniID')
            ->Where('a.UniName','Like','%' . $q .'%')
            ->orWhere('roadrace.PlayerName','Like','%' . $q .'%')
            ->orWhere('roadrace.Rank','Like','%' . $q .'%')
            //->where(['weightlifting.Uni'=>'unis.UniID'])
            ->select('a.UniName','a.Image','a.UniID','roadrace.*')
            ->orderBy('roadrace.Rank','acs')
            ->get();

        if(count($r)>0){
            return view('SportResultView.RoadRace',compact('r'));
        }
    }
    return view('SportResultView.RoadRace')->withMessage('No data founds');
});



//Route::get('/karatekumiteresult','ResultController@karate_kumite');
Route::post('/karatekumite','ResultController@karate_kumiteresult');

Route::get('/karatekataresult','ResultController@karatekata');
Route::post('/kataresult','ResultController@karatekataresult');


Route::get('/weightresult','ResultController@WeightLifting');
Route::post('weight','ResultController@weight');

//Route::get('trackfield','ResultController@tracksport');
Route::get('trackfield','ResultController@tracksport');
Route::get('/trackfield/{Event}','ResultController@trackfield');

Route::get('track1','ResultController@track1');
Route::get('track2','ResultController@track2');
Route::get('track3','ResultController@track3');

Route::post('/updatePoint','PointTable@TotalPoint');


Route::get('/image', function() {
    $image = DB::table('unis')->get();
    return View::make('image', compact('image'));
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users/logout','Auth\LoginController@userLogout')->name('user.logout');

Route::prefix('officers')->group(function(){
    Route::get('/', 'OfficersController@index')->name('adminhome');
    Route::get('/login','Auth\OfficersLoginController@showLogin')->name('officers.login');
    Route::post('/login','Auth\OfficersLoginController@login')->name('officers.login.submit');
    Route::get('/logout','Auth\OfficersLoginController@logout')->name('officers.logout');
    //Route::get('logout', 'Auth\OfficersLoginController@logout')->name('officers.login');
});


// Route::prefix('players')->group(function(){
//     Route::get('/', 'PlayersController@index')->name('players.dashboard');
//     Route::get('/login','Auth\OfficersLoginController@showPlayerLogin')->name('players.login');
//     Route::post('/login','Auth\OfficersLoginController@Playerlogin')->name('players.login.submit');
// });

Route::get('/sportresult',function(){
    return view('design.sportsresult');
});
Route::get('/Badminton - M,WRules',function(){
    return view('sportRule.badmintonRules');
});
Route::get('/Basketball - M,WRules',function(){
    return view('sportRule.basketballRules');
});
Route::get('Baseball - MRules',function(){
    return view('sportRule.BaseballRules');
});
Route::get('Carrom - M,WRules',function(){
    return view('sportRule.CarromRules');
});
Route::get('Chess - M,WRules',function(){
    return view('sportRule.ChessRules');
});
Route::get('Cricket - MRules',function(){
    return view('sportRule.CricketRules');
});
Route::get('Elle - M,WRules',function(){
    return view('sportRule.ElleRules');
});
Route::get('Football - MRules',function(){
    return view('sportRule.FootballRules');
});
Route::get('Hockey - M,WRules',function(){
    return view('sportRule.HockeyRules');
});
Route::get('Netball - WRules',function(){
    return view('sportRule.NetballRules');
});
Route::get('Rugby Football - MRules',function(){
    return view('sportRule.RugbyFootballRules');
});
Route::get('Swimming - M,WRules',function(){
    return view('sportRule.SwimmingRules');
});
Route::get('Table Tennis - M,WRules',function(){
    return view('sportRule.TableTennisRules');
});
Route::get('Taekwondo - M,WRules',function(){
    return view('sportRule.TaekwondoRules');
});

Route::get('Tennis - M,WRules',function(){
    return view('sportRule.TennisRules');
});


Route::get('Track and Field - M,WRules',function(){
    return view('sportRule.TrackAndFieldRules');
});
Route::get('Volleyball - M,WRules',function(){
    return view('sportRule.VolleyballRules');
});
Route::get('Karate - M,WRules',function(){
    return view('sportRule.KarateRules');
});
Route::get('Rowing - MRules',function(){
    return view('sportRule.RowingRules');
});
Route::get('Wrestling - MRules',function(){
    return view('sportRule.WrestlingRules');
});
Route::get('Weightlifting - MRules',function(){
    return view('sportRule.WeightliftingRules');
});
Route::get('Road Race -MRules',function(){
    return view('sportRule.RoadRaceRules');
});
Route::get('SportsHome',function(){
    return view('NewHome.Home');
});

Route::get('create','AlbumController@create');
Route::post('store','AlbumController@store');


Route::get('/image', array('as' => 'index','uses' => 'AlbumsController@getList'));
Route::get('/createalbum', array('as' => 'create_album_form','uses' => 'AlbumsController@getForm'));
Route::post('/createalbum', array('as' => 'create_album','uses' => 'AlbumsController@postCreate'));
Route::get('/deletealbum/{id}', array('as' => 'delete_album','uses' => 'AlbumsController@getDelete'));
Route::get('/album/{id}', array('as' => 'show_album','uses' => 'AlbumsController@getAlbum'));
Route::get('/addimage/{id}', array('as' => 'add_image','uses' => 'ImagesController@getForm'));
Route::post('/addimage', array('as' => 'add_image_to_album','uses' => 'ImagesController@postAdd'));
Route::get('/deleteimage/{id}', array('as' => 'delete_image','uses' => 'ImagesController@getDelete'));
Route::post('/moveimage', array('as' => 'move_image', 'uses' => 'ImagesController@postMove'));


Route::get('/homealbum/{id}', array('as' => 'homealbum','uses' => 'AlbumsController@getHomeAlbum'));
// Route::get('/homealbum',function(){
//     return view('home.Gallery');
// });
Route::get('/homealbum','AlbumsController@index');
Route::get('show/{id}','AlbumsController@albumImageShow');


//location

Route::get('/Kotawila',function(){
    return view('Location.KotawilaGround');
});

Route::get('/Beliatta',function(){
    return view('Location.BeliattaGround');
});

Route::get('/Colombo Rowing Club',function(){
    return view('Location.RowingClub');
});

Route::get('/Engineering Faculty, Galle',function(){
    return view('Location.Efac');
});



Route::get('/Gymkhana - Colombo',function(){
    return view('Location.GymkhanaClub');
});
Route::get('/Gym-University of Ruhuna',function(){
    return view('Location.GymUOR');
});
Route::get('/Hall 1-University of Ruhuna',function(){
    return view('Location.Hall1UOR');
});
Route::get('/Hall 2-University of Ruhuna',function(){
    return view('Location.Hall2UOR');
});
Route::get('/BOIKoggala',function(){
    return view('Location.KoggalaBOI');
});

Route::get('/KotawilaIndoor',function(){
    return view('Location.KotawilaIndoor');
});

Route::get('/Kotawila Swimming Pool',function(){
    return view('Location.KotawilaPool');
});

Route::get('/UniOfRuhuna',function(){
    return view('Location.UniOfRuhuna');
});

Route::get('/UniOfPera',function(){
    return view('Location.UniOfPera');
});

Route::get('/University of Ruhuna',function(){
    return view('Location.UniOfRuhuna');
});

Route::get('/Uyanwatta',function(){
    return view('Location.UyanwattaGround');
});
Route::get('/Sugathadasa Stadium',function(){
    return view('Location.SugathadasaStadium');
});

Route::get('pointtable','addPointTable@point');
Route::post('savepointtable','addPointTable@savePoint');
Route::post('/UpdatePointResult','addPointTable@UpdatePointResult');
Route::get('/UpdatepointView/{UniName}','addPointTable@UpdatepointView');





Route::get('/RunningResults','ResultController@RunningResults');
Route::post('/serachrunningresult','ResultController@SearchRunningResults');

Route::get('/JumpingResults','ResultController@JumpingResults');
Route::post('/serachjumpingresult','ResultController@SearchJumpingResults');

Route::get('/ThrowingResults','ResultController@ThrowingResults');
Route::post('/serachthrowingresult','ResultController@SearchThrowingResults');

Route::get('resultswimming','ResultController@SwimmingResults');
Route::get('/swimmingresults','ResultController@AllSwimmingResults');
Route::post('/serachswimmingresult','ResultController@searchSwimmingResult');



Route::get('/athleticpoints','addPointTable@pointAthletic');
Route::get('/hockeypoints','addPointTable@pointHockey');
Route::get('/baseballpoints','addPointTable@pointBaseball');
Route::get('/rugbypoints','addPointTable@pointRugby');
Route::get('/cricketpoints','addPointTable@pointCricket');
Route::get('/ellepoints','addPointTable@pointElle');
Route::get('/netballpoints','addPointTable@pointnetball');
Route::get('/basketballpoints','addPointTable@pointBasketball');
Route::get('/chesspoints','addPointTable@pointChess');
Route::get('/carrompoints','addPointTable@pointCarrom');
Route::get('/karatepoints','addPointTable@pointKarate');
Route::get('/footballpoints','addPointTable@pointFootball');
Route::get('/taekwondopoints','addPointTable@pointTaekwondo');
Route::get('/swimmingpoints','addPointTable@pointSwimming');
Route::get('/badmintonpoints','addPointTable@pointBadminton');
Route::get('/wrestlingpoints','addPointTable@pointWrestling');
Route::get('/weightpoints','addPointTable@pointWeight');
Route::get('/tennispoints','addPointTable@pointTennis');
Route::get('/tabletennispoints','addPointTable@pointTabletennis');
Route::get('/volleyballpoints','addPointTable@pointVolleyball');

Route::get('/Individual','ResultController@SwimmingIndividualResults');
Route::get('/Relay','ResultController@SwimmingRelayResults');

Route::get('/sparringresult','ResultController@tae');
Route::get('/poomsaeresult','ResultController@PoomsaeResult');
Route::get('/taekwondoresult','ResultController@taekwondo');
Route::post('searchsparring','ResultController@searchTaekwondo');


Route::get('/Taekwondo','AddAllSportsResult@viewTaekwondoResult');
Route::post('/saveMensSparringResult','AddAllSportsResult@saveMensSparringResult');
Route::post('/saveWomensSparringResult','AddAllSportsResult@saveWomensSparringResult');
Route::post('/savePoomsaeIndividualResult','AddAllSportsResult@savePoomsaeIndividualResult');
Route::post('/savePoomsaeTeamResult','AddAllSportsResult@savePoomsaeTeamResult');
Route::get('/deleteTeaekwondoSparringResult/{MatchNo}/{Uni1_Player}/{Uni2_Player}/{Gender}','AddAllSportsResult@deleteTeaekwondoSparringResult');
Route::get('/deletePoomsaeIndividualResult/{MatchNo}/{PlayerName}/{Gender}','AddAllSportsResult@deletePoomsaeIndividualResult');
Route::get('/deletePoomsaeTeamResult/{MatchNo}/{Uni}/{Gender}','AddAllSportsResult@deletePoomsaeTeamResult');

//Route::get('/taekwondoresult','ResultController@TaekwondoResults');

Route::get('/rowingresults','ResultController@rowing');


