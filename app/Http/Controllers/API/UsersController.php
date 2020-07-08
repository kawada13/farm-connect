<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\config\Rule;
use App\Model\User;
use App\Model\Admin;
use App\Model\Client;
use App\Model\Delivery;
use App\Model\Member;
use App\Model\Favorite;

class UsersController extends Controller
{
    public function updateMemberProfile(Request $request)
    {
        $this->validate($request, Rule::editMemberRules(), Rule::editMemberMessages());

        $member = $this->memberCheck($request->cookie('token'));

        $member->name = $request->input('name');;
        $member->email = $request->input('email');
        $member->save();


        return response()->json([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ], 200);
    }

    public function createMemberAddress(Request $request)
    {
        $this->validate($request, Rule::createMemberDeliveryRules(), Rule::createMemberDeliveryMessages());

        $user = User::select('*')
            ->where('remember_token', $request->input('token'))
            ->first();

        $delinfo = new Delivery();
        $delinfo->name = $request->input('name');
        $delinfo->zip = $request->input('zip');
        $delinfo->address = $request->input('address');
        $delinfo->tel = $request->input('tel');
        $delinfo->member_id = $user->member_id;
        $delinfo->save();


        return response()->json([
            'name' => $request->input('name'),
            'zip' => $request->input('zip'),
            'address' => $request->input('address'),
            'tel' => $request->input('tel'),
        ], 200);
    }
    public function editMemberAddress(Request $request)
    {
        $this->validate($request, Rule::createMemberDeliveryRules(), Rule::createMemberDeliveryMessages());

        $user = User::select('*')
            ->where('remember_token', $request->input('token'))
            ->first();

        $delinfo = Delivery::where('id', $request->input('deliveryId'))->first();
        $delinfo->name = $request->input('name');
        $delinfo->zip = $request->input('zip');
        $delinfo->address = $request->input('address');
        $delinfo->tel = $request->input('tel');
        $delinfo->member_id = $user->member_id;
        $delinfo->save();


        return response()->json([
            'name' => $request->input('name'),
            'zip' => $request->input('zip'),
            'address' => $request->input('address'),
            'tel' => $request->input('tel'),
        ], 200);
    }

    public function deleteMemberAddress(Request $request)
    {

        $user = User::select('*')
            ->where('remember_token', $request->input('token'))
            ->first();

        $delinfo = Delivery::where('id', $request->input('deliveryId'))
            ->delete();

        return response()->json([
        ], 200);
    }

    public function editMemberPassword(Request $request)
    {
        $this->validate($request, Rule::editMemberPasswordRules(), Rule::editMemberPasswordMessages());

        $user = User::select('*')
            ->where('remember_token', $request->input('token'))
            ->first();


        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->remember_token = $request->input('token');
        $user->admin_id = $request->input('admin_id');
        $user->client_id = $request->input('client_id');
        $user->member_id = $request->input('member_id');
        $user->scope = $request->input('scope');
        $user->save();


        return response()->json([
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'remember_token' => $request->input('token'),
            'admin_id' => $request->input('admin_id'),
            'client_id' => $request->input('client_id'),
            'member_id' => $request->input('member_id'),
            'scope' => $request->input('scope'),
        ], 200);
    }

    public function favorite(Request $request)
    {
        $user = User::select('*')
            ->where('remember_token', $request->input('token'))
            ->first();

        if(empty($user->member_id))
        {
            return response()->json([
                'error' => 'ログイン必須です',
            ], 404);
        }

        $favorite = Favorite::where('member_id', $user->member_id)
        ->where('product_id', $request->input('product_id'))
        ->first();

        if(!empty($favorite->id))
        {
            return response()->json([
                'error' => '登録済です',
            ], 404);
        }

        $favorite = new Favorite();
        $favorite->member_id = $user->member_id;
        $favorite->product_id = $request->input('product_id');
        $favorite->save();

        return response()->json([
            'token' => $request->input('token'),
            'product_id' => $request->input('product_id'),
        ], 200);
    }
    public function unfavorite(Request $request)
    {
        $user = User::select('*')
            ->where('remember_token', $request->input('token'))
            ->first();

        $favorite = Favorite::select('*')
            ->where('member_id', $user->member_id)
            ->where('product_id', $request->input('product_id'))
            ->delete();

        return response()->json([
            'token' => $request->input('token'),
            'product_id' => $request->input('product_id'),
        ], 200);
    }
}
