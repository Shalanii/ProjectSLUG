<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;
use DB;
class autoComplete extends Controller
{
    //
  /*  public function autoComplete(Request $request){
    $data = Player::select("Name")->where("Name","LIKE","%{$request->input('query')}%")
                    ->get();
    return response()->json($data);
    }
*/

public function searchResponse(Request $request){
      $query = $request->get('term','');
      $players=DB::table('players');
          if($request->type=='u1p1'){
                $players->where('Name','LIKE','%'.$query.'%');
              }
          if($request->type=='u2p1'){
                $players->where('Name','LIKE','%'.$query.'%');
              }
          if($request->type=='u1p2'){
                $players->where('Name','LIKE','%'.$query.'%');
              }
          if($request->type=='u2p2'){
                $players->where('Name','LIKE','%'.$query.'%');
              }
                $players=$players->get();        
                $data=array();
          foreach ($players as $player) {
                $data[]=array('Name'=>$player->Name);
              }
          if(count($data))
                return $data;
          else
                return ['Name'=>''];
        
          }
}
