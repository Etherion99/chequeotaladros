<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReviewItem extends Model
{
    public function ReviewCategory(){
    	return $this->belongsTo('App\ReviewCategory', 'category');
    }

    public function ReviewItemRecords(){
    	return $this->belongsToMany('App\ReviewItemRecord');
    }
}
