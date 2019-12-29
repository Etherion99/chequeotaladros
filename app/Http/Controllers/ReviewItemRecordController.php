<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReviewItemRecord;

class ReviewItemRecordController extends Controller
{
    public function showByReview($id){
    	ReviewItemRecord::where('review_id', $id)->get();
    }
}
