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

    public function memberAdressIndex(Request $request) 
    {
        $member = $this->memberCheck($request->cookie('token'));

        return view('member.address.index', ['member' => $member]);
    }
    public function memberAdressCreate(Request $request) 
    {

        return view('member.address.create');
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


// public function memberAdress(Request $request) 
//     {
//         $delinfo = Member::with(['deliveryInfos']);

//         return view('member.address.index', ['delinfo' => $delinfo]);
//     }
