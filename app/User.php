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
    	return $this->hasMany('App\Project', 'creator_doc');
    }

    public function share_projects(){
    	return $this->belongsToMany('App\Project', 'user_project');
    }
}
