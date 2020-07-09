<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;
use App\Model\Member;
use App\Model\Delivery;
use App\Model\Favorite;

class UsersController extends Controller
{
    public function memberShow(Request $request) 
    {
        $member = $this->memberCheck($request->cookie('token_members'));
        if(empty($member))
        {
            return redirect('/login/member');
        }

        return view('member.show', ['member' => $member]);
    }

    public function memberEdit(Request $request) 
    {
        $member = $this->memberCheck($request->cookie('token_members'));

        return view('member.edit', ['member' => $member]);
    }

    public function memberAdressIndex(Request $request) 
    {
        $member = $this->memberCheck($request->cookie('token_members'));

        $user = User::select('*')
            ->where('remember_token', $request->cookie('token_members'))
            ->first();
        
        $deliveries = Delivery::select('*')
        ->where('member_id', $user->member_id)
        ->get();


        return view('member.address.index', ['deliveries' => $deliveries]);
    }
    public function memberAdressCreate(Request $request) 
    {
        $member = $this->memberCheck($request->cookie('token_members'));

        return view('member.address.create');
    }
    public function memberAdressEdit(Request $request, $id) 
    {
        $member = $this->memberCheck($request->cookie('token_members'));

        $delivery = Delivery::find($id);

        return view('member.address.edit', ['delivery' => $delivery]);
    }
    public function membersocialSetting(Request $request) 
    {
        $member = $this->memberCheck($request->cookie('token_members'));

        return view('member.social.index');
    }

    public function clientMypage(Request $request) 
    {
        $client = $this->clientCheck($request->cookie('token_clients'));
        
        if(empty($client))
        {
            return redirect('/login/client');
        }

        return view('client.mypage', ['client' => $client]);
    }

    public function clientProfile(Request $request) 
    {

        return view('clientShow');
    }
    


}
