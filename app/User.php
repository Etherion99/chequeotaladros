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

    public function project(){
    	return $this->hasOne('App\Project');
    }
}
