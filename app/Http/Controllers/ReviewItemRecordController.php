<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReviewItemRecord;
use App\ReviewCategory;

class ReviewItemRecordController extends Controller
{
    public function showByReview($id){
    	$categories = ReviewCategory::with('items')->get();

    	$categoryRecords = array();

    	foreach($categories as $category){
    		$records = array();

    		foreach($category['items'] as $item){
    			$record = ReviewItemRecord::where('review_id', $id)
    				->where('item_id', $item['id'])
    				->get();

    			array_push($records, $record);
    		}

    		array_push($categoryRecords, array(
    			'id' => ,
    			'items' => $records
    		));
    	}

    	//ReviewItemRecord::where('review_id', $id)->with('item.category')->get();

    	return response()->json($categoryRecords);
    }
}
