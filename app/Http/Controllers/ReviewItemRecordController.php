<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReviewItemRecord;

class ReviewItemRecordController extends Controller
{
    public function showByReview($id){
    	return response()->json(ReviewItemRecord::where('review_id', $id)->with('item.category')->get());
    }
}
