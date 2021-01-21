<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Resources\TaskResource;
use App\Helpers\APIHelper;
use App\Models\Task;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        if(!$request->user()){
            return;
        }

        $assigned_tasks = TaskResource::collection($request->user()->assigned_tasks);
        $created_tasks = TaskResource::collection($request->user()->created_tasks);

        $res = APIHelper::APIResponse(200, ['assigned' => $assigned_tasks, 'created' => $created_tasks]);
        return response()->json($res);
    }

    public function store(StoreTaskRequest $request)
    {
        if(!$request->user()){
            return;
        }

        $request->validated();

        $task = new Task();
        $task->project_id = $request->project;
        $task->creator_id = $request->user()->id;
        $task->title = $request->title;
        $task->description = $request->description;
        if($request->assignee != 0) {
            $task->assignee_id = $request->assignee;
        }
        $task->type_id = $request->type;
        $task->progress_id = $request->progress;
        $task->priority_id = $request->priority;

        $task->save();

        return response()->json(APIHelper::APIResponse(200, $task));
        
    }
}
