<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReviewItemRecord;
use App\ReviewCategory;
use App\ReviewItem;
use App\ReviewItemPhoto;

class ReviewItemRecordController extends Controller
{
    public function showByReview($id){
    	$categories = ReviewCategory::where('id', $id)->with('items')->get(); //para borrar el 3

    	$categoryRecords = array();

    	foreach($categories as $category){
    		$items = array();

    		foreach($category['items'] as $item){
    			$record = ReviewItemRecord::where('review_id', $id)
    				->where('item_id', $item['id'])
                    ->with('operating_conditions')
    				->first();

    			if(isset($record))
                    $photos = ReviewItemPhoto::where('review_item_record', $record->id)->get();

                    foreach($photos as $photo){
                        $photo->type = 'internet';
                    }

    				$record->photos = $photos;


    			$item->record = $record;

    			array_push($items, $item);
    		}

    		array_push($categoryRecords, array(
    			'id' => $category['id'],
    			'name' => $category['name'],
    			'items' => $items
    		));
    	}

    	ReviewItemRecord::where('review_id', $id)->with('item.category')->get();

    	return response()->json($categoryRecords);
    }
}
