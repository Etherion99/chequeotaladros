<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReviewItemPhoto extends Model
{
	protected $fillable = [
        'review_item_record',
        'extension'
    ];

    public function ReviewItemRecord(){
    	return $this->belongsTo('App\ReviewItemRecord', 'review_item_record');
    }
}
