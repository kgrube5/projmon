<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\APIHelper;
use App\Models\Priority;

class PriorityController extends Controller
{
    public function index(Request $request) {
        if(!$request->user()){
            return;
        }
        $res = APIHelper::APIResponse(200, Priority::all());
        return response()->json($res);
    }
}
