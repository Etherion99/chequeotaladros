<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ReviewCategory;

class ReviewCategoryController extends Controller{

    public function showAll(){
    	$categories = ReviewCategory::with('Items')->get();

        return response()->json($categories);
    }
}
