<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public function reviewItemRecords(){
    	return $this->hasMany('App\ReviewitemRecord');
    }
}
