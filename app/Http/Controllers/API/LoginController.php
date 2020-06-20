<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use App\Model\User;

class LoginController extends Controller
{
    public function create(Request $request)
    {
        if(empty($request->input('email')) || empty($request->input('password'))){
            return response()->json([
                'error' => '未入力があります',
            ], 403);
        }
        $user = new User();
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->scope = 'admins';
        $user->save();
        
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
