<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReviewItemRecord extends Model
{
    public function OperatingConditions(){
    	return $this->hasMany('App\OperatingCondition');
    }
}
