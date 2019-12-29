<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ReviewCategory;

class ReviewCategoryController extends Controller{

    public function showAll(){
    	$categories = ReviewCategory::where('id', 1)->with('Items')->get();

        return response()->json($categories);
    }
}
