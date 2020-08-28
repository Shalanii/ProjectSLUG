<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
class OfficersLoginController extends Controller
{
    //
    public function __construct(){
        $this->middleware('guest:officers',['except'=>['logout']]);
        //$this->middleware('guest:players');
    }

    public function showLogin(){
        return view('auth.officers-login');
    }
    public function login(Request $request){
        $this->validate($request,[
            'nic'=>'required',
            'password'=>'required|max:14'
        ]);

        if(Auth::guard('officers')->attempt(['nic'=>$request->nic,'password'=>$request->password])){

            return redirect()->intended(route('adminhome'));

        }

        return redirect()->back()->withInput($request->only('nic'));

    }

    public function logout()
    {
        Auth::guard('officers')->logout();
        return redirect('NewHome');
    }

    // public function logout() {
    //     $this->guard('officers')->logout();

    //     $request->session()->invalidate();

    //     return redirect('officers.login');
    //   }

    // public function showPlayerLogin(){
    //     return view('auth.players-login');
    // }
    // public function Playerlogin(Request $request){
    //     $this->validate($request,[
    //         'nic'=>'required',
    //         'password'=>'required|max:14'
    //     ]);

    //     if(Auth::guard('players')->attempt(['nic'=>$request->nic,'password'=>$request->password])){

    //         return redirect()->intended(route('players.dashboard'));

    //     }

    //     return redirect()->back()->withInput($request->only('nic'));

    // }
}
