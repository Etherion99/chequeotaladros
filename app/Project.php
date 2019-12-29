<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name', 'creator_doc',
    ];

    public function creator_user(){
    	return $this->belongsTo('App\User', 'creator_doc');
    }

    public function share_users(){
    	return $this->belongsToMany('App\User');
    }
}
