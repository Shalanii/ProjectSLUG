<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Validator;
use App\Album;
use DB;

class AlbumsController extends Controller
{
  public function getList()
  {
      $albums = Album::with('Photos')->get();
      return view('Gallery.index')->with('albums',$albums);
  }
  public function index(){
    $albums = Album::with('Photos')->get();
    return view('home.Gallery',['albums'=>$albums]);
  }
  public function getAlbum($id)
  {
      $album = Album::with('Photos')->find($id);
      $albums = Album::with('Photos')->get();
      //dd($album);
      return view('Gallery.album', ['album'=>$album, 'albums'=>$albums]);
      //->with('album',$album);
  }
  public function getHomeAlbum($id)
  {
      $album = Album::with('Photos')->find($id);
      $albums = Album::with('Photos')->get();
      //dd($album);
      return view('home.Gallery', ['album'=>$album, 'albums'=>$albums]);
      //->with('album',$album);
  }
  public function getForm()
  {
      return view('Gallery.createalbum');
  }
  public function postCreate(Request $request)
  {
      /*$rules = array(
        'name' => 'required',
        'cover_image'=>'required|image'
    );*/
      $rules = ['name' => 'required', 'cover_image'=>'required|image'];
      $input = ['name' => null];
      //Validator::make($input, $rules)->passes(); // true
      $validator = Validator::make($request->all(), $rules);
      if($validator->fails()){
        // return Redirect::route('create_album_form') ;
        return redirect()->route('create_album_form')->withErrors($validator)->withInput();
      }
      // $file = Input::file('cover_image');
      $file = $request->file('cover_image');
      $random_name = str_random(8);
      $destinationPath = 'albums/';
      $extension = $file->getClientOriginalExtension();
      $filename=$random_name.'_cover.'.$extension;
      $uploadSuccess = $request->file('cover_image')->move($destinationPath, $filename);
      $album = Album::create(array(
        'name' => $request->get('name'),
        'description' => $request->get('description'),
        'cover_image' => $filename,
      ));
      return redirect()->route('show_album',['id'=>$album->id]);
  }
  public function getDelete($id)
  {
      $album = Album::where('id',$id)->first();
      // $album->delete();
      // return Redirect()->route('index');


      if ($album != null) {
        $album->delete();
        return redirect()->route('index')->with(['message'=> 'Successfully deleted!!']);
    }

    //return redirect()->back()->with(['message'=> 'Wrong ID!!']);
  }
  public function albumImageShow($id){
    $imageid=DB::table('images')
            //->join('images','albums.id','=','images.album_id')
            ->where('images.album_id',$id)
            ->get()->toArray();
    if(count($imageid)>0){
            return view('home.ShowImage',['imageid'=>$imageid]);
        }
        else{
          return view('home.ShowImage')->with('message','No Images Founds');
        }


  }
  
}
