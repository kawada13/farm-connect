<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use App\Model\User;
use App\Model\Admin;
use App\Model\Client;
use App\Model\Member;
use Illuminate\Validation\ValidationException;
use App\config\Rule;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function createAdmin(Request $request)
    {
        $this->validate($request, Rule::createRules(), Rule::createMessages());

        $admin = new Admin();
        $admin->name = 'name';
        $admin->email = $request->input('email');
        $admin->save();

        $user = new User();
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->remember_token = hash('sha256', Str::random(60));
        $user->admin_id = $admin->id;
        $user->scope = 'admins';
        $user->save();
        
        return response()->json([
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'token' => $user->remember_token,
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
            'token' => $user->remember_token,
        ], 200);
    }

    public function createClient(Request $request)
    {
        $this->validate($request, Rule::createRules(), Rule::createMessages());

        $client = new Client();
        $client->name = 'name';
        $client->email = $request->input('email');
        $client->address = $request->input('address');
        $client->save();

        $user = new User();
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->remember_token = hash('sha256', Str::random(60));
        $user->client_id = $client->id;
        $user->scope = 'clients';
        $user->save();
        
        return response()->json([
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'address' => $request->input('address'),
            'token' => $user->remember_token,
        ], 200);
    }

    public function loginClient(Request $request) 
    {
        $this->validate($request, Rule::loginRules(), Rule::loginMessages());

        

        $user = User::select('*')
        ->where('email', $request->input('email'))
        ->where('password', $request->input('password'))
        ->where('scope', 'clients')
        ->first();

        if(empty($user->id)){
            return response()->json([
                'error' => 'ログイン認証に失敗しました',
            ], 403);
        }

        return response()->json([
            'token' => $user->remember_token,
        ], 200);
    }
    public function createMember(Request $request)
    {
        $this->validate($request, Rule::createRules(), Rule::createMessages());

        $member = new Member();
        $member->name = 'name';
        $member->email = $request->input('email');
        $member->address = $request->input('address');
        $member->save();

        $user = new User();
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->remember_token = hash('sha256', Str::random(60));
        $user->member_id = $member->id;
        $user->scope = 'members';
        $user->save();
        
        return response()->json([
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'address' => $request->input('address'),
            'token' => $user->remember_token,
        ], 200);
    }

    public function loginMember(Request $request) 
    {
        $this->validate($request, Rule::loginRules(), Rule::loginMessages());

        

        $user = User::select('*')
        ->where('email', $request->input('email'))
        ->where('password', $request->input('password'))
        ->where('scope', 'members')
        ->first();

        if(empty($user->id)){
            return response()->json([
                'error' => 'ログイン認証に失敗しました',
            ], 403);
        }

        return response()->json([
            'token' => $user->remember_token,
        ], 200);
    }
}
