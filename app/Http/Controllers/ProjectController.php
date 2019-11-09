<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Project;
use App\User;

use Exception;

class ProjectController extends Controller
{
	public function show($id){
		$project = Project::where('id', $id)->get();

		return response()->json($project);
	}

	public function showByCreator($creator){
		$projects = Project::where('creator', $creator);

		return response()->json($projects);
	}

    public function getAll(){
    	$projects = Project::with('creatorUser')->get();

    	return response()->json($projects);
    }

    public function store(Request $request){
    	$response = [
    		'code' => 200,
    		'message' => 'successful',
    		'ok' => true
    	];

        $request = [
            "name": "proyecto",
            "creatorUser": {
                "doc": 1
            },
            "shareUsers": [
                {
                    "doc": 2
                },
                {
                    "doc": 3
                }
            ]
        ]

    	//try{
    		$creator = User::find($request->creatorUser['doc'])->first();

    		$project = new Project;
			$project->name = $request->name;
			$project->creatorUser()->associate($creator);

            /*foreach($request->shareUsers as $shareUser){
                $shareUser = User::find($shareUser['doc'])->first();
                $project->shareUsers()->attach($shareUser);
            }*/

	        $project->save();
    	/*} catch (\Exception $e){
    		$response = [
                'ok' => false,
                'code' => $e,
                'message' => 'duplicate email'
            ];
    	}*/

        return response()->json($response);
    }
}
