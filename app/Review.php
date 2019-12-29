<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
	protected $fillable = [
        'creator', 'project_id'
    ];

    public function creator(){
    	return $this->belongsTo('App\User', 'creator');
    }

    public function reviewItemRecords(){
    	return $this->hasMany('App\ReviewitemRecord');
    }
}
