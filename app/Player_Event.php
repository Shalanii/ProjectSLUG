<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player_Event extends Model
{
    //
     //public $table = 'player{player_events}';
    public $timestamps=false;
     protected $fillable = [
        'MatchNo',
        'Uni1',
        'Uni2',
        'SportGroup',
        'Round',
        'Sport',
        'Date',
        'Time',
        'Venue',
        'Gender'
      ];
}
