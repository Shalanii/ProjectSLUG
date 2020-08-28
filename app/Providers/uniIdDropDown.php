<?php
namespace App\Providers;
use App\Uni;
use App\Point_System;
use DB;
use App\Sports_Teams;
use App\Player_Event;
use Illuminate\Support\ServiceProvider;
class uniIdDropDown extends ServiceProvider{
    public function boot(){

            view()->composer('*',function($view){
                $view->with('uniIDarray',Uni::all());
            });
            view()->composer('*',function($view){
                $view->with('placeArray',Point_System::all());
            });
            view()->composer('*',function($view){
                $view->with('sportArray',sports_teams::all());
            });
            view()->composer('*',function($view){
                $view->with('pointArray',Point_System::all());
            });
            view()->composer('*',function($view){
                $view->with('teamsArray',Point_System::all());
            });
         
    }
    
}