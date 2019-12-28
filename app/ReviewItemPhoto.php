<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReviewItemPhoto extends Model
{
    public function ReviewItemRecord(){
    	return $this->belongsTo('App\ReviewItemRecord');
    }
}
