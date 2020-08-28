<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Validator;
use App\Album;
use App\Image;

class ImagesController  extends Controller
{
    public function getForm($id)
    {
      $album = Album::find($id);
      return view('Gallery.addimage')
      ->with('album',$album);
    }
    public function postAdd(Request $request)
    {
      // $this->validate($request,[
      //   'album_id' => 'required|numeric|exists:albums,id',
      //   'image'=>'required|image'
      // ]);
      // $input = ['album_id' => null];
      // $validator = Validator::make($request->all(), $rules);
      // if($validator->fails()){
      //     return redirect()->route('add_image', ['id' => $request->get('album_id')])->withErrors($validator)->withInput();
      // }
      if($request->hasFile('image')){

        $file = $request->file('image');
        $imglength=count($file);

        for($i=0; $i<$imglength; $i++){

          $extension = $file[$i]->getClientOriginalExtension();
          $destinationPath = 'albums/';
          $random_name = str_random(8);
          $filename=$random_name.'_album_image.'.$extension;
          $file[$i]->move($destinationPath, $filename);
          Image::create(array(
        
            'image' => $filename,
            'album_id'=> $request->get('album_id')

          ));

        }
        return redirect()->route('show_album',['id'=>$request->get('album_id')])->with('msg','images added succesfully');
    }
    else{
        return back()->with('msg','Please Choose any Images');
    }
      // if($request->hasFile('image')){
      //   foreach($request->image as $image){
      //     $filename=$image->getClientOriginalName();
      //     $file->storeAs('albums/',$filename);
      //     $image=new Image();
      //     $image->image=$filename;
      //     $image->album_id=$request->get('album_id');

      //     $image->save();
      //     return redirect()->back();
      //   }
      
    }
    public function getDelete($id)
    {
      $image = Image::find($id);
      $image->delete();
      return redirect()->route('show_album',['id'=>$image->album_id]);
    }
    public function postMove(Request $request)
  {
    $rules = array(
      'new_album' => 'required|numeric|exists:albums,id',
      'photo'=>'required|numeric|exists:images,id'
    );
    $validator = Validator::make($request->all(), $rules);
    if($validator->fails()){
      return redirect()->route('index');
    }
    $image = Image::find($request->get('photo'));
    $image->album_id = $request->get('new_album');
    $image->save();
    return redirect()->route('show_album', ['id'=>$request->get('new_album')]);
  }
  
}



