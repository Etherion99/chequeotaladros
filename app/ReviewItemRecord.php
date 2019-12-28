<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReviewItemRecord extends Model
{
    public function OperatingConditions(){
    	return $this->hasMany('App\OperatingCondition');
    }

    public function review(){
    	return $this->belongsTo('App\Review');
    }
    public function ReviewItemPhotos(){
    	return $this->hasMany('App\ReviewItemPhoto');
    }
}
