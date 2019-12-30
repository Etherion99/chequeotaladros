<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OperatingCondition extends Model
{
	protected $fillable = [
        'type',
        'value',
        'record_id'
    ];

    public function record(){
    	return $this->belongsTo('App\ReviewItemRecord', 'record_id');
    }
}
