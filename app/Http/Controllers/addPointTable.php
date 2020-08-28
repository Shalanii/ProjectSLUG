<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Point;
use App\Total_Point;
use DB;
use Excel;
use App\Total;
class addPointTable extends Controller
{
    //


	 public function Point(){
        $data=Total::all();
        return view('Point.TotalPoint')->with('datas',$data)->with('message','Successfully'); 
    }


    public function savePoint(Request $request){
        $point = new Total;

        $this->validate($request,[
            'UniName'=>'required',
            'MensTotal'=>'required|numeric',
            'WomensTotal'=>'required|numeric',
        ]);


        $point->UniName=$request->UniName;
        $point->MensTotal=$request->MensTotal;
        $point->WomensTotal=$request->WomensTotal;


        $point->save();
        $data=Total::all();

        return view('Point.TotalPoint')->with('datas',$data)->with('message','Successfully');
    }


    public function UpdatepointView($UniName){

        $data = Total::where('UniName','LIKE','%'.$UniName.'%')->first();
        return view('Point.UpdatePointTable')->with('points',$data);

    }
    public function UpdatePointResult(Request $request){

        $UniName=$request->UniName;
        $MensTotal=$request->MensTotal;
        $WomensTotal=$request->WomensTotal;
        $Total=$MensTotal+$WomensTotal;
        
        Total::where('UniName',$UniName)->update([
            'MensTotal'=>$MensTotal,
            'WomensTotal'=>$WomensTotal,
            'Total'=>$Total,

        ]);

        $datas=DB::table('total')->orderBy('Total','desc')->get();
        return view('Point.TotalPoint')->with('datas',$datas);

    }

    
    public function pointAthletic(){
        $data=DB::table('points')
		->join('unis','unis.UniID','=','points.UniID')
                ->where('points.Sport','=','Athletic')->where('points.Gender','=','male')
                ->select('unis.UniName','points.Points','unis.Image')
		->orderBy('points.Points','desc')
                ->get();
        $data1=DB::table('points')
		->join('unis','unis.UniID','=','points.UniID')
                ->where('points.Sport','=','Athletic')->where('points.Gender','=','female')
                ->select('unis.UniName','points.Points','unis.Image')
		->orderBy('points.Points','desc')
                ->get();
        return view('Point.Athletic')->with('data',$data)->with('data1',$data1);
    }
	public function pointHockey(){
        $data=DB::table('points')
		->join('unis','unis.UniID','=','points.UniID')
                ->where('points.Sport','=','Hockey')
                ->select('unis.UniName','points.*','unis.Image')
		->orderBy('points.Gender','desc')
		->orderBy('points.Points','desc')
                ->get();
		if(count($data) >0){
        	      return view('Point.Hockey')->with('data',$data);
		     }
		else{
		return view('Point.Hockey')->with('message','Not Found Points Result');
		}


    }
	public function pointBaseball(){
        $data=DB::table('points')
		->join('unis','unis.UniID','=','points.UniID')
                ->where('points.Sport','=','Baseball')
                ->select('unis.UniName','points.Points','unis.Image')
		->orderBy('points.Points','desc')
                ->get();

		if(count($data) >0){
        	  return view('Point.Baseball')->with('data',$data);
		     }
		else{
		return view('Point.Baseball')->with('message','Not Found Points Result');
		}

            
    }
	public function pointRugby(){
        $data=DB::table('points')
		->join('unis','unis.UniID','=','points.UniID')
                ->where('points.Sport','=','Rugby')
                ->select('unis.UniName','points.Points','unis.Image')
		->orderBy('points.Points','desc')
                ->get();
		if(count($data) >0){
        	  return view('Point.Rugby')->with('data',$data);
		     }
		else{
		return view('Point.Rugby')->with('message','Not Found Points Result');
		}

            
    }
	public function pointCricket(){
        $data=DB::table('points')
		->join('unis','unis.UniID','=','points.UniID')
                ->where('points.Sport','=','Cricket')
                ->select('unis.UniName','points.Points','unis.Image')
		->orderBy('points.Gender','desc')
		->orderBy('points.Points','desc')
                ->get();
		if(count($data) >0){
        	   return view('Point.Cricket')->with('data',$data);
		     }
		else{
		return view('Point.Cricket')->with('message','Not Found Points Result');
		}

            
    }
		public function pointElle(){
        $data=DB::table('points')
		->join('unis','unis.UniID','=','points.UniID')
                ->where('points.Sport','=','Elle')
                ->select('unis.UniName','points.Points','unis.Image')	
		->orderBy('points.Gender','desc')
		->orderBy('points.Points','desc')
                ->get();
		if(count($data) >0){
        	   return view('Point.Elle')->with('data',$data);
		     }
		else{
		return view('Point.Elle')->with('message','Not Found Points Result');
		}

             
    }
		public function pointNetball(){
                $data=DB::table('points')
		->join('unis','unis.UniID','=','points.UniID')
                ->where('points.Sport','=','Netball')
                ->select('unis.UniName','points.Points','unis.Image')
		->orderBy('points.Points','desc')
                ->get();
		if(count($data) >0){
        	 return view('Point.Netball')->with('data',$data); 
		     }
		else{
		return view('Point.Netball')->with('message','Not Found Points Result');
		}

        
    }
		public function pointBasketball(){
        $data=DB::table('points')
		->join('unis','unis.UniID','=','points.UniID')
                ->where('points.Sport','=','Basketball')
                ->select('unis.UniName','points.Points','unis.Image')
		->orderBy('points.Gender','desc')
		->orderBy('points.Points','desc')
                ->get();
		if(count($data) >0){
        	 return view('Point.Basketball')->with('data',$data);	 
		     }
		else{
		return view('Point.Basketball')->with('message','Not Found Points Result');
		}

               
    }
	public function pointChess(){
        $data=DB::table('points')
		->join('unis','unis.UniID','=','points.UniID')
                ->where('points.Sport','=','Chess')
                ->select('unis.UniName','points.Points','unis.Image')	
		->orderBy('points.Gender','desc')
		->orderBy('points.Points','desc')
                ->get();
		if(count($data) >0){
        	 return view('Point.Chess')->with('data',$data);
	      }
		else{
		return view('Point.Chess')->with('message','Not Found Points Result');
		}

              
    }
	public function pointCarrom(){
        $data=DB::table('points')
		->join('unis','unis.UniID','=','points.UniID')
                ->where('points.Sport','=','Carrom')
                ->select('unis.UniName','points.Points','unis.Image')
		->orderBy('points.Gender','desc')
		->orderBy('points.Points','desc')
                ->get();
		if(count($data) >0){
        	 return view('Point.Carrom')->with('data',$data);
	      }
		else{
		return view('Point.Carrom')->with('message','Not Found Points Result');
		}

             
    }

	public function pointKarate(){
        $data=DB::table('points')
		->join('unis','unis.UniID','=','points.UniID')
                ->where('points.Sport','=','Karate')
                ->select('unis.UniName','points.Points','unis.Image')
		->orderBy('points.Gender','desc')
		->orderBy('points.Points','desc')
                ->get();
		if(count($data) >0){
        	  return view('Point.Karate')->with('data',$data);
	      }
		else{
		return view('Point.Karate')->with('message','Not Found Points Result');
		}

              
    }

	public function pointFootball(){
        $data=DB::table('points')
		->join('unis','unis.UniID','=','points.UniID')
                ->where('points.Sport','=','Football')
                ->select('unis.UniName','points.Points','unis.Image')
		->orderBy('points.Gender','desc')
		->orderBy('points.Points','desc')
                ->get();
		if(count($data) >0){
        	  return view('Point.Basketball')->with('data',$data);
	      }
		else{
		return view('Point.Basketball')->with('message','Not Found Points Result');
		}

               
    }

	public function pointTaekwondo(){
        $data=DB::table('points')
		->join('unis','unis.UniID','=','points.UniID')
                ->where('points.Sport','=','Taekwondo')
                ->select('unis.UniName','points.*','unis.Image')
		->orderBy('points.Gender','desc')
		->orderBy('points.Points','desc')
                ->get();
          
		if(count($data) >0){
        	  return view('Point.Taekwondo')->with('data',$data);
	      }
		else{
		return view('Point.Taekwondo')->with('message','Not Found Points Result');
		}

    }

	public function pointSwimming(){
        $data=DB::table('points')
		->join('unis','unis.UniID','=','points.UniID')
                ->where('points.Sport','=','Swimming')
                ->select('unis.UniName','points.*','unis.Image')
		->orderBy('points.Gender','desc')
		->orderBy('points.Points','desc')
                ->get();
        
		if(count($data) >0){
        	return view('Point.Swimming')->with('data',$data);
	      }
		else{
		return view('Point.Swimming')->with('message','Not Found Points Result');
		}

    }

	public function pointBadminton(){
        $data=DB::table('points')
		->join('unis','unis.UniID','=','points.UniID')
                ->where('points.Sport','=','Badminton')
                ->select('unis.UniName','points.Points','unis.Image')
		->orderBy('points.Gender','desc')
		->orderBy('points.Points','desc')
                ->get();
       	      if(count($data) >0){
        	return view('Point.Badminton')->with('data',$data);
	      }
		else{
		return view('Point.Badminton')->with('message','Not Found Points Result');
		}
    }

	public function pointWrestling(){
        $data=DB::table('points')
		->join('unis','unis.UniID','=','points.UniID')
                ->where('points.Sport','=','Wrestling')
                ->select('unis.UniName','points.Points','unis.Image')
		->orderBy('points.Points','desc')
                ->get();
		 if(count($data) >0){
        	 return view('Point.Wrestling')->with('data',$data);
	      }
		else{
		return view('Point.Wrestling')->with('message','Not Found Points Result');
		}

           
    }

	public function pointWeight(){
        $data=DB::table('points')
		->join('unis','unis.UniID','=','points.UniID')
                ->where('points.Sport','=','Weightlifting')
                ->select('unis.UniName','points.Points','unis.Image')
		->orderBy('points.Gender','desc')
		->orderBy('points.Points','desc')
                ->get();

		 if(count($data) >0){
        	 return view('Point.Weightlifting')->with('data',$data);
	      }
		else{
		return view('Point.Weightlifting')->with('message','Not Found Points Result');
		}
             
    }

		public function pointTennis(){
                $data=DB::table('points')
		->join('unis','unis.UniID','=','points.UniID')
                ->where('points.Sport','=','Tennis')
                ->select('unis.UniName','points.Points','unis.Image')
		->orderBy('points.Gender','desc')
		->orderBy('points.Points','desc')
                ->get();
		
		 if(count($data) >0){
        	 return view('Point.Tennis')->with('data',$data);
	      }
		else{
		return view('Point.Tennis')->with('message','Not Found Points Result');
		}

           
    }

	
		public function pointTabletennis(){
        $data=DB::table('points')
		->join('unis','unis.UniID','=','points.UniID')
                ->where('points.Sport','=','Tabletennis')
                ->select('unis.UniName','points.Points','unis.Image')
		->orderBy('points.Gender','desc')
		->orderBy('points.Points','desc')
                ->get();
		 if(count($data) >0){
        	  return view('Point.Tabletennis')->with('data',$data);	  
	    }
		else{
		return view('Point.Tabletennis')->with('message','Not Found Points Result');
		}

               
    }

		public function pointVolleyball(){
        $data=DB::table('points')
		->join('unis','unis.UniID','=','points.UniID')
                ->where('points.Sport','=','Volleyball')
                ->select('unis.UniName','points.Points','unis.Image')
		->orderBy('points.Gender','desc')
		->orderBy('points.Points','desc')
                ->get();
		 if(count($data) >0){
        	  return view('Point.Volleyball')->with('data',$data);  
	    }
		else{
		return view('Point.Volleyball')->with('message','Not Found Points Result');
		}

          
    }



    public function index(){

        $data = DB::table('points')->orderBy('Sport','desc')->get();
        return view('AddPoint',compact('data'));

    }

    public function import(Request $request){

        $this->validate($request,[

                'select_file'=>'required|mimes:xls,xlsx'

        ]);        

             $total=0;

             $path=$request->file('select_file')->getRealPath();

                $data = Excel::load($path)->get();
                
                if($data->count() > 0){

                    foreach($data->toArray() as $key => $value){

                        // foreach($value as $row){

                            $insert_data[] = array(
                                'Sport'        =>   $value['sport'],
                                'Gender'       =>   $value['gender'],
                                'UniID'        =>   $value['uniid'],
                                'Points'       =>   $value['points'],
                            );
                        // }    
                    }
                    if(!empty($insert_data))
                    {
                       // $point=DB::table('points')->get();
                        //$value=$data->toArray();
                       // $total+='10';
                        DB::table('points')->insert($insert_data);
                        //DB::table('total')->where('UniID','COL')->update(['MensTotal',$total])->toArray();
                        
                    }
                    $total++;
                    
                }
                return back()->with('success','Excel Data Imported Successfully.');
    }


}
