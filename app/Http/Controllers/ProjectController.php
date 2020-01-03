<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Project;
use App\User;

use Exception;

class ProjectController extends Controller
{

    public function showAll(Request $request){
        if(gettype($request->own) == 'string')
            $request->own == "true" ? true : false;

        if($request->own)
            $projects = Project::where('creator_doc', $request->user_doc)
                        ->with('creator_user')->get();
        else
            $projects = User::find($request->user_doc)->share_projects()->get();

        return response()->json($projects);
    }

    public function store(Request $request){
        $response = [
            'code' => 200,
            'message' => 'successful',
            'ok' => true
        ];

        $creator = User::find($request->creator_user['doc'])->first();

        $project = new Project;
        $project->name = $request->name;
        $project->creator_user()->associate($creator);
        $project->save();

        foreach($request->share_users as $shareUser){
            $shareUserModel = User::where('doc', $shareUser['doc'])->first();
            $project->share_users()->attach($shareUserModel);
        }

        return response()->json($response);
    }

    public function delete(Request $request){

        $response = [
            'code' => 200,
            'message' => 'successful',
            'ok' => true
        ];

        foreach($request->all() as $project){
            Project::where('id', $project['id'])->delete();
        }

        return response()->json($response);
    }

    //por revisar
	public function show($id){
		$project = Project::where('id', $id)->with(['creator_user', 'share_users'])->first();

		return response()->json($project);
	}

	public function showByCreator($creator){
		$projects = Project::where('creator', $creator);

		return response()->json($projects);
	}
}
