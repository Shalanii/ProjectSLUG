<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//LIST NOTICES
Route::get('Notices','AppController@ShowAllNotices');

//View A SINGLE NOTICE
Route::get('Notice/{id}','AppController@ShowNotice');

//LIST A SINGLE NOTICE
//Route::get('Notice/{id}','AppController@show');

//VIEW EVENT RESULTS
//Route::post('Results1','TeamGames1Controller@index');

//Login
Route::post('login','AppController@AppLogin');

//Road Race Result
Route::get('RoadRaceResult','AppController@ViewRoadRaceResult');

//View Accommodation
Route::get('Accommodation','AppController@ViewAccommodation');

//ViewBadmintonResults
Route::get('BadmintonResults','AppController@ViewBadminton');

//ViewNetballResults
Route::get('netball','AppController@netball');

//ViewVolleyballResults
Route::get('VolleyballResults','AppController@ViewVolleyball');

//ViewTTResults
Route::get('TTennisResults','AppController@ViewTTennis');

//ViewBaseballResults
Route::get('BaseballResults','AppController@ViewBaseball');

//ViewBasketballResults
Route::get('BasketballResults','AppController@ViewBasketball');

//ViewCricketResults
Route::get('CricketResults','AppController@ViewCricket');

//ViewBasketballResults
Route::get('FootballResults','AppController@ViewFootball');

//ViewFootballResults
Route::get('FootballResults','AppController@ViewFootball');

//ViewRugbyfootballResults
Route::get('RugbyFootball','AppController@ViewRugbyFootball');

//ViewRunning Results
Route::get('Running','AppController@ViewRunning');

//ViewRunningHundredResults
Route::get('RunningHundred','AppController@ViewRunningHundred');

//View 200m runing results
Route::get('RunningTwoHundred','AppController@ViewRunningTwoHundred');

//View RunningFourHundred results
Route::get('RunningFourHundred','AppController@ViewRunningFourHundred');

//View RunningEightHundred results
Route::get('RunningEightHundred','AppController@ViewRunningEightHundred');

//View RunningOneFiveHundred results
Route::get('RunningOneFiveHundred','AppController@ViewRunningOneFiveHundred');

//View RunningOneFiveHundred results
Route::get('RunningFiveThousand','AppController@ViewRunningFiveThousand');

//View RunningFourHundredHurdles results
Route::get('RunningFourHundredHurdles','AppController@ViewRunningFourHundredHurdles');

//View RunningHundredRelay results
Route::get('RunningHundredRelay','AppController@ViewRunningHundredRelay');

//View RunningFourHundredRelay results
Route::get('RunningFourHundredRelay','AppController@ViewRunningFourHundredRelay');

//View HighJump results
Route::get('HighJump','AppController@ViewHighJump');

//View LongJump results
Route::get('LongJump','AppController@ViewLongJump');

//View TripleJump results
Route::get('TripleJump','AppController@ViewTripleJump');

//View PoleVault results
Route::get('PoleVault','AppController@ViewPoleVault');

//View ShotPut results
Route::get('ShotPut','AppController@ViewShotPut');

//View JavelinThrow results
Route::get('JavelinThrow','AppController@ViewJavelinThrow');

//View DiscusThrow results
Route::get('DiscusThrow','AppController@ViewDiscusThrow');

//View schedule results
Route::get('Schedule','AppController@ViewSchedule');

//View points
Route::get('Points','AppController@ViewPoints');

//View carrom
Route::get('carrom','AppController@ViewCarrom');

//View Logo
Route::get('logos','AppController@UniLogos');

//View Elle
Route::get('elle','AppController@ViewElle');

//View hockey
Route::get('hockey','AppController@ViewHockey');

//View Kata
Route::get('kata','AppController@ViewKata');

//View Kumite
Route::get('kumite','AppController@ViewKumite');

//View Rowing
Route::get('rowing','AppController@ViewRowing');

//View Taekwondo
Route::get('taekwondo','AppController@ViewTaekwondo');

//View Wrestling
Route::get('wrestling','AppController@ViewWrestling');

//View WeightLifting
Route::get('weightLifting','AppController@ViewWeightLifting');

//View WeightLifting
Route::get('weightLifting','AppController@ViewWeightLifting');

//ViewTennisResults
Route::get('tennisResults','AppController@ViewTennis');

//ViewSwimming
Route::get('swimming','AppController@ViewSwimming');

//ViewSwimming Individual
Route::get('swimmingIndividual','AppController@ViewSwimmingIndividual');

//View Swimming Team
Route::get('swimmingTeam','AppController@ViewSwimmingTeam');

//View hurdles results
Route::get('hurdles','AppController@ViewHurdles');

//View relay results
Route::get('relay','AppController@ViewRelay');

//View chess results
Route::get('chess','AppController@ViewChess');

//View TaekwondoIndividualPoomsae results
Route::get('individualPoomsae','AppController@ViewTaekwondoIndividualPoomsae');

//View TaekwondoTeamPoomsae results
Route::get('teamPoomsae','AppController@ViewTaekwondoTeamPoomsae');

//View TaekwondoSparring results
Route::get('sparring','AppController@ViewTaekwondoSparring');

//View Logo
Route::get('logo','AppController@ViewBadmintonLogo');

//test1
Route::get('poomsae','AppController@Poomsae');