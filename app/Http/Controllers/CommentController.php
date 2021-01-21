<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Project;
use App\Helpers\APIHelper;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        if(!$request->user())
        {
            return APIHelper::APIResponse(401, 'Please log in to post a comment.', true);
        }

        if($request->type === 'task') 
        {
            $comment = Task::findOrFail($request->id)->comments()->create([
                'comment' => $request->comment,
                'user_id' => $request->user()->id
            ]);
            $res = APIHelper::APIResponse(200, $comment);
        } else if($request->type === 'project') {
            $comment = Project::findOrFail($request->id)->comments()->create([
                'comment' => $request->comment,
                'user_id' => $request->user()->id
            ]);
            $res = APIHelper::APIResponse(200, $comment);
        } else {
            $res = APIHelper::APIResponse(200, 'Failed to post comment. Please try again.', true);
        }
        return response()->json($res);
    }
}
