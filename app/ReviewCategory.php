<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReviewCategory extends Model
{
    public function items(){
    	return $this->hasMany('App\ReviewItem');
    }
}
