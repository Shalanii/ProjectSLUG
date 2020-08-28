<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Player;
use App\Volunteer_Details;
use Excel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class ImportExcelController extends Controller
{
    //
    public function index(){

        $data = DB::table('users')->orderBy('id','ASC')->get();
        return view('import_excelPlayer',compact('data'));

    }

    public function import(Request $request){

        $this->validate($request,[

                'select_file'=>'required|mimes:xls,xlsx'

        ]);        
           
             $path=$request->file('select_file')->getRealPath();

                $data = Excel::load($path)->get();
                
                if($data->count() > 0){

                    foreach($data->toArray() as $key => $value){

                        // foreach($value as $row){
                            //return $value;
                            $insert_data[] = array(
                                'id'       =>   $value['id'],
                                'Name'       =>   $value['pname'],
                                'UniID'      =>   $value['uniid'],
                                'Gender'      =>   $value['gender'],
                                'Sport'     =>   $value['sport'],
                                'nic'        =>   $value['nic'],
                                'password'   =>   Hash::make($value[('password')]),
                                
                            );
                        // }    
                    }
                    if(!empty($insert_data))
                    {
                        DB::table('users')->insert($insert_data);
                    }
                    
                }
                return back()->with('success','Excel Data Imported Successfully.');

    }

    //import Officers Data

    
    public function index1(){

        return view('importOfficersData');

    }
    

    public function officersAdd(Request $request){

        $this->validate($request,[

                'select_file'=>'required|mimes:xls,xlsx'

        ]);        
           
             $path=$request->file('select_file')->getRealPath();

                $data = Excel::load($path)->get();
                
                if($data->count() > 0){

                    foreach($data->toArray() as $key => $value){

                        // foreach($value as $row){

                            $insert_data[] = array(

                                'id'   =>   $value['oid'],
                                'name'       =>   $value['name'],
                                'birthday' => $value['birthday'],
                                'nic'      =>   $value['nic'],
                                'email'        =>   $value['email'],
                                'password'     =>   Hash::make($value['password']),
                                'gender'     =>   $value['gender'],
                            );
                        // }    
                    }
                    if(!empty($insert_data))
                    {
                        DB::table('officers')->insert($insert_data);
                    }
                    
                }
                return back()->with('success','Officers Data Imported Successfully.');

    }
    
}
