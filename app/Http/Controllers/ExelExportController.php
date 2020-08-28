<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Excel;

class ExelExportController extends Controller
{
    //
   /* function index(){

        $player_data=DB::table('players')->get();
        return view('Export_PlayerData')->with('player_data',$player_data);

    }
    function excel(){

        $player_data= DB::table('players')->get()
        ->toArray();
        $player_array[] = array('PlayerID','Name','Birthday','UniID','Nic','Gender');

        foreach($player_data as $player){
            $player_array[] = array(
            'PlayerID'=>$player->PlayerID,
             'Name'=>$player->Name,
             'Birthday'=>$player->Birthday,
             'UniID'=>$player->UniID,
             'Nic'=>$player->Nic,
             'Gender'=>$player->Gender       

            );

        }
        Excel::create('Player Data', function($excel) use(
            $player_array){
                $excel->setTitle('Player Data');
                $excel->sheet('Player Data',function($sheet)
                    use ($player_array){
                        $sheet->fromArray($player_array,null,'A1',false,false);
                    }
                );
            }
        )->download('xlsx');


    }*/


}
