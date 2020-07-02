<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;
use App\Model\Member;
class UsersController extends Controller
{
    public function memberShow(Request $request) 
    {
        $user = User::select('*')
        ->where('remember_token', $request->cookie('token'))
        ->first();
        
        $member = Member::select('*')
        ->where('email', $user->email)
        ->first();

        return view('member.show', ['member' => $member]);
    }
    public function memberEdit(Request $request) 
    {
        $user = User::select('*')
        ->where('remember_token', $request->cookie('token'))
        ->first();
        
        $member = Member::select('*')
        ->where('email', $user->email)
        ->first();

        return view('member.edit', ['member' => $member]);
    }
}
