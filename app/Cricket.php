<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cricket extends Model
{
    //
    protected $table="cricket";
   // protected $fillable = ['MatchNo','Round','SportGroup','Uni1','Uni1_Score','Uni1_Wickets','Uni1_Overs','Uni2','Uni2_Score','Uni2_Wickets','Uni2_Overs','Result_Description'];
    public $timestamps=false;
}
