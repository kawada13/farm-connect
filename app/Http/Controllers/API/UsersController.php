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

class UsersController extends Controller
{
    public function updateMemberProfile(Request $request)
    {
        $this->validate($request, Rule::editMemberRules(), Rule::editMemberMessages());

        $user = User::select('*')
            ->where('remember_token', $request->input('token'))
            ->first();

        $member = Member::select('*')
            ->where('email', $user->email)
            ->first();

        $member->name = $request->input('name');;
        $member->email = $request->input('email');
        $member->save();


        return response()->json([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'token' => $user->remember_token,
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
}



