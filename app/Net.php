<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Net extends Model
{
    //public $table = 'nets';
    
    protected $fillable = [
        'EventID',
        'UniID',
        'Score',
        'Result'
      ];

}
