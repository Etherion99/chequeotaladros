<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProject extends Model
{
    public function user(){
    	return $this->hasMany('App\User' , 'user_doc');
    }

    public function project(){
    	return $this->hasMany('App\Project' , 'project_id');
    }
}
