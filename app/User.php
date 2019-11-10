<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'doc', 'name', 'email', 'password',
    ];

    protected $hidden = [
        'password',
    ];

    protected $primaryKey = 'doc';

    public function projects(){
    	return $this->hasMany('App\Project', 'doc');
    }

    public function shareProjects(){
    	return $this->belongsToMany('App\Project');
    }
}
