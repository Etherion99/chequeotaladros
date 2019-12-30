<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OperatingCondition extends Model
{
    public function record(){
    	return $this->belongsTo('App\ReviewItemRecord', 'record_id')
    }
}
