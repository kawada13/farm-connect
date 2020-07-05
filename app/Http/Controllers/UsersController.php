<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;
use App\Model\Member;
use App\Model\Delivery;
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

        $user = User::select('*')
            ->where('remember_token', $request->cookie('token'))
            ->first();
        
        $deliveries = Delivery::select('*')
        ->where('member_id', $user->member_id)
        ->get();


        return view('member.address.index', ['deliveries' => $deliveries]);
    }
    public function memberAdressCreate(Request $request) 
    {
        $member = $this->memberCheck($request->cookie('token'));

        return view('member.address.create');
    }
    public function memberAdressEdit(Request $request, $id) 
    {
        $member = $this->memberCheck($request->cookie('token'));

        $delivery = Delivery::find($id);

        return view('member.address.edit', ['delivery' => $delivery]);
    }

    public function memberPasswordEdit(Request $request) 
    {
        $member = $this->memberCheck($request->cookie('token'));

        return view('member.password.edit', ['member' => $member]);
    }

    public function membersocialSetting(Request $request) 
    {
        $member = $this->memberCheck($request->cookie('token'));

        return view('member.social.index');
    }

}
