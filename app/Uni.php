<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Uni extends Model
{
    //
    protected $table='unis';
    protected $fillable = ['UniName','UniID','Image'];
}
