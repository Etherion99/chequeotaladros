<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReviewItem extends Model
{
    public function category(){
    	return $this->belongsTo('App\ReviewCategory', 'category_id');
    }

    public function ReviewItemRecords(){
    	return $this->belongsToMany('App\ReviewItemRecord');
    }
}
