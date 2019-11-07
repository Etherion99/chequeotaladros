<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name', 'creator',
    ];

    public function creator(){
    	return $this->hasOne('App\User', 'creator');
    }
}
