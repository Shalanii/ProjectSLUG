<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Point;

class PointTable extends Controller
{
    //
    public function TotalPoint(){
     
        $point = new Point;
        $place = $point->Place;
        $point1 = $point->Points;
        $uni = $point->UniName;

        if(($place=='Champions')||($place=='1st Runner-up')||($place=='2nd Runner-up')||($place=='4th Place')||($place=='Losers of Quarter Finals -1')||($place=='Losers of Quarter Finals -2')||($place=='Losers of Quarter Finals -3')||($place=='Losers of Quarter Finals -4')||($place=='Losers of Preliminary Rounds')){
            if($point1=='15'||$point1=='14'||$point1=='13'||$point1=='12'||$point1=='11'||$point1=='10'||$point1=='9'||$point1=='8'||$point1=='7'
            ||$point1=='6'||$point1=='5'||$point1=='4'||$point1=='3'||$point1=='2'||$point1=='1'||$point1=='0'){
                    $total += $point1;
                    Total_Point::where('UniName',$uni)->update(['Points'=>$total]);
                    // return $x;
            }
        }
        

  

    }

}
