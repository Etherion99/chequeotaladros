<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ReviewCategory;

class ReviewCategoryController extends Controller{

    public function showAll(){
    	$categories = ReviewCategory::with('items')->get();//para borrar el 3

        return response()->json($categories);
    }
}
