<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Project;
use App\Models\Task;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::middleware('auth:sanctum')->group(function() {

    Route::get('/user', function(Request $request){
        return $request->user();
    });

    Route::get('/projects', function(Request $request) {
        return $request->user()->projects;
    });

    Route::get('/projects/{id}', function($id) {
        return Project::find($id);
    });

    Route::get('/projects/{id}/tasks', function($id) {
        return Project::find($id)->tasks;
    });

    Route::get('/tasks/{id}', function($id) {
        return Task::find($id);
    });

});