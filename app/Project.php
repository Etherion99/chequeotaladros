<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name', 'creator',
    ];

    public function creator_user(){
    	return $this->belongsTo('App\User', 'creator');
    }

    public function share_users(){
    	return $this->belongsToMany('App\User');
    }
}
