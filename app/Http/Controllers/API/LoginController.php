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
    public function login(Request $request)
    {
        $this->validate($request, Rule::loginRules(), Rule::loginMessages());



        $user = User::select('*')
            ->where('email', $request->input('email'))
            ->where('password', $request->input('password'))
            ->where('scope', $request->input('scope'))
            ->first();

        if (empty($user->id)) {
            return response()->json([
                'error' => 'ログイン認証に失敗しました。アドレス、パスワードをご確認ください。',
            ], 403);
        }

        return response()->json([
            'token' => $user->remember_token,
            'scope' => $user->scope,
        ], 200);
    }


    public function createAdmin(Request $request)
    {
        $this->validate($request, Rule::createAdminRules(), Rule::createAdminMessages());

        $admin = new Admin();
        $admin->name = $request->input('name');
        $admin->email = $request->input('email');
        $admin->save();
        
        $user = self::createUser($request, 'admins', $admin->id);

        return response()->json([
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'token' => $user->remember_token,
        ], 200);
    }

    private static function createUser(Request $request, $scope, $id)
    {
        $user = new User();
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->remember_token = hash('sha256', Str::random(60));
        $user->admin_id = $scope === 'admins' ? $id : 0;
        $user->client_id = $scope === 'clients' ? $id : 0;
        $user->member_id = $scope === 'members' ? $id : 0;
        $user->scope = $scope;
        $user->save();
        return $user;
    }


    public function createClient(Request $request)
    {
        $this->validate($request, Rule::createClientRules(), Rule::createClientMessages());

        $client = new Client();
        $client->name = $request->input('name');
        $client->email = $request->input('email');
        $client->save();

        $user = self::createUser($request, 'clients', $client->id);

        return response()->json([
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'token' => $user->remember_token,
        ], 200);
    }

    public function createMember(Request $request)
    {
        $this->validate($request, Rule::createMemberRules(), Rule::createMemberMessages());

        $member = new Member();
        $member->name = $request->input('name');
        $member->email = $request->input('email');
        $member->save();

        $user = self::createUser($request, 'members', $member->id);

        return response()->json([
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'token' => $user->remember_token,
        ], 200);
    }
}
