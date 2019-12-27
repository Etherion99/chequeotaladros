<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReviewCategory extends Model
{
    public function Items(){
    	return $this->hasMany('App\ReviewItem', 'category');
    }
}
