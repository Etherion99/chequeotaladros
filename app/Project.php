<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name', 'creator',
    ];

    public function creatorUser(){
    	return $this->belongsTo('App\User', 'creator');
    }

    public function shareUsers(){
    	return $this->belongsToMany('App\User');
    }
}
