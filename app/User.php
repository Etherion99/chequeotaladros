<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'doc',
        'name',
        'email',
        'password'
    ];

    protected $hidden = [
        'password',
    ];

    protected $primaryKey = 'doc';

    public function reviews(){
        return $this->hasMany('App\Review', 'creator_doc');
    }

    public function projects(){
    	return $this->hasMany('App\Project', 'creator');
    }

    public function shareProjects(){
    	return $this->belongsToMany('App\Project');
    }
}
