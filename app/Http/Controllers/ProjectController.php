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
    	$projects = Project::with('creator')->get();

    	return response()->json($projects);
    }

    public function store(Request $request){
    	$response = [
    		'code' => 200,
    		'message' => 'successful',
    		'ok' => true
    	];

    	//try{
    		$creator = User::find($request->creator['doc'])->first();

    		$project = new Project;
			$project->name = $request->name;
			$project->creatord()->associate($creator);
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
