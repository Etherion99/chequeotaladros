<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
	protected $fillable = [
        'creator_doc', 'project_id'
    ];

    public function creator(){
    	return $this->belongsTo('App\User', 'creator_doc');
    }

    public function reviewItemRecords(){
    	return $this->hasMany('App\ReviewitemRecord');
    }
}
