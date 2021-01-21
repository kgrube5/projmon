<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Helpers\APIHelper;

class ProjectController extends Controller
{
    public function store(Request $request)
    {

        if(!$request->user())
        {
            $res = APIHelper::APIResponse(
                401, 
                'You must be logged in to create a project.',
                true
            );
            return response()->json($res, 401);
        }

        $project = Project::create([
            'title' => $request->title,
            'user_id' => $request->user()->id
        ]);

        $project->users()->attach($request->user()->id);

        $res = APIHelper::APIResponse(
            200,
            $project
        );

        return response()->json($res, 200);
    }

    public function users(Request $request, $id)
    {
        if(!$request->user())
        {
            return;
        }

        $res = APIHelper::APIResponse(200, Project::find($id)->users);
        return response()->json($res);
    }
}
