<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\APIHelper;
use App\Models\Progress;

class ProgressController extends Controller
{
    public function index(Request $request) {
        if(!$request->user()){
            return;
        }
        $res = APIHelper::APIResponse(200, Progress::all());
        return response()->json($res);
    }
}
