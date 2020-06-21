<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use App\Model\User;
use App\Model\Admin;
use Illuminate\Validation\ValidationException;
use App\config\Rule;

class LoginController extends Controller
{
    public function createAdmin(Request $request)
    {
        if(empty($request->input('email')) || empty($request->input('password'))){
            return response()->json([
                'error' => '未入力があります',
            ], 403);
        }
        $admin = new Admin();
        $admin->name = 'name';
        $admin->email = $request->input('email');
        $admin->save();

        $user = new User();
        $user->email = $request->input('email');
        $user->password = $request->input('password');

        $user->admin_id = $admin->id;
        $user->scope = 'admins';
        $user->save();
        
        return response()->json([
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ], 200);
    }

    public function loginAdmin(Request $request) 
    {
        $this->validate($request, Rule::loginRules(), Rule::loginMessages());

        

        $user = User::select('*')
        ->where('email', $request->input('email'))
        ->where('password', $request->input('password'))
        ->where('scope', 'admins')
        ->first();

        if(empty($user->id)){
            return response()->json([
                'error' => 'ログイン認証に失敗しました',
            ], 403);
        }

        return response()->json([
            'user' => $user->id,
        ], 200);
    }
}
