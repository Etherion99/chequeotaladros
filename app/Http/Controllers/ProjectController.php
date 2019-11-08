<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Project;
use App\User;

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
    	$creator = User::find($request->creator->doc)->first();

    	$project = new project;
		$project->name = $request->doc;
		$project->creator()->associate($creator);
        $project->save();
    }
}
