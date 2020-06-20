<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class LoginController extends Controller
{
    public function create(Request $request)
    {
        return response()->json([
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ], 200);
    }

    public function test() 
    {
        return response()->json([
            'test' => 'test',
        ], 200);
    }
}
