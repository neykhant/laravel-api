<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function test(){
        return response()->json(
            [
                'result' => 1,
                'data' => 'testing',
                'message' => 'You are Login'
            ]
            );
    }
}
