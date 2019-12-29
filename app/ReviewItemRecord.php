<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReviewItemRecord extends Model
{
	protected $fillable = [
        'review_id',
        'item_id',
        'comment'
    ];

    public function OperatingConditions(){
    	return $this->hasMany('App\OperatingCondition');
    }

    public function review(){
    	return $this->belongsTo('App\Review', 'review_id');
    }

    public function item(){
        return $this->belongsTo('App\ReviewItem', 'item_id');
    }

    public function ReviewItemPhotos(){
    	return $this->hasMany('App\ReviewItemPhoto', 'review_item_record');
    }
}
