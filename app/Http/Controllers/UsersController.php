<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;
use App\Model\Member;
class UsersController extends Controller
{
    public function memberShow(Request $request) 
    {
        
        $member = $this->memberCheck($request->cookie('token'));

        return view('member.show', ['member' => $member]);

    }

    public function memberEdit(Request $request) 
    {
        $member = $this->memberCheck($request->cookie('token'));

        return view('member.edit', ['member' => $member]);
    }

    public function memberAdress(Request $request) 
    {
        $member = $this->memberCheck($request->cookie('token'));

        return view('member.address.index', ['member' => $member]);
    }

    public function memberPasswordEdit(Request $request) 
    {
        $member = $this->memberCheck($request->cookie('token'));

        return view('member.password.edit', ['member' => $member]);
    }

    public function membersocialSetting() 
    {

        return view('member.social.index');
    }

}
