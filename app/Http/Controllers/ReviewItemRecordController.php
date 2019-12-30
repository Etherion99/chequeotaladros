<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReviewItemRecord;
use App\ReviewCategory;
use App\ReviewItem;

class ReviewItemRecordController extends Controller
{
    public function showByReview($id){
    	$categories = ReviewCategory::with('items')->get();

    	$categoryRecords = array();

    	foreach($categories as $category){
    		$items = array();

    		foreach($category['items'] as $item){
    			$record = ReviewItemRecord::where('review_id', $id)
    				->where('item_id', $item['id'])
    				->first();

    			$record->photos = array();

    			$item->record = $record;

    			array_push($items, $item);
    		}

    		array_push($categoryRecords, array(
    			'id' => $category['id'],
    			'name' => $category['name'],
    			'items' => $items
    		));
    	}

    	//ReviewItemRecord::where('review_id', $id)->with('item.category')->get();

    	return response()->json($categoryRecords);
    }
}
