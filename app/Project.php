<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name', 'creator',
    ];

    public function creatord(){
    	return $this->belongsTo('App\User', 'creator');
    }
}
