<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReviewItem extends Model
{
    public function reviewCategory(){
    	return $this->belongsTo('App\ReviewCategory', 'category');
    }

    public function ReviewItemRecords(){
    	return $this->belongsToMany('App\ReviewItemRecord');
    }
}
