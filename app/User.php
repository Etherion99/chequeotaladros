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

    public function projects(){
    	return $this->hasMany('App\Project', 'doc');
    }
}
