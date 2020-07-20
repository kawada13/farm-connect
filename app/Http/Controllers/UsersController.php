<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;
use App\Model\Member;
use App\Model\Client;
use App\Model\Delivery;
use App\Model\Favorite;
use App\Model\Commitment;
use App\Model\Product;
use App\Model\Follow;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function memberShow(Request $request)
    {
        $member = $this->memberCheck($request->cookie('token_members'));
        if (empty($member)) {
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

    public function memberFavoriteIndex(Request $request)
    {
        $member = $this->memberCheck($request->cookie('token_members'));

        $favorites = Favorite::with(['product'])
            ->where('member_id', $member->id)
            ->get();

        return view('member.favorites', ['member' => $member, 'favorites' => $favorites]);
    }


    public function clientMypage(Request $request)
    {
        $client = $this->clientCheck($request->cookie('token_clients'));

        if (empty($client)) {
            return redirect('/login/client');
        }

        return view('client.mypage', ['client' => $client]);
    }
    public function clientProfile(Request $request)
    {
        $client = $this->clientCheck($request->cookie('token_clients'));

        if (empty($client)) {
            return redirect('/login/client');
        }

        return view('client.profile', ['client' => $client]);
    }
    public function clientIndex(Request $request)
    {
        $products = Product::with(['client'])
            ->where('title', 'like', '%' . $request->input('keyword') . '%')
            ->get();

        $title = $this->getSearchTitle($request);

        $products_url = str_replace('clients', 'products', $request->fullUrl());

        $clients = Client::select('*')
            ->get();

        return view('client.index', ['clients' => $clients, 'title' => $title, 'products_url' => $products_url]);
    }

    public function clientShow(Request $request, $id)
    {
        $user = User::select('*')
            ->where('remember_token', $request->cookie('token_members'))
            ->first();

        $client = Client::find($id);

        $commitments = Commitment::select('*')
            ->where('client_id', $client->id)
            ->get();

        $products = Product::select('*')
            ->where('client_id', $client->id)
            ->get();

        $is_following = $this->is_following($user->member_id, $client->id);

        return view('client.show', ['client' => $client, 'commitments' => $commitments, 'products' => $products, 'is_following' => $is_following]);
    }

    public function is_following($memberId, $clientId)
    {
        return
            Follow::select('*')
            ->where('member_id', $memberId)
            ->where('client_id', $clientId)
            ->first();
    }

    public function memberFollowIndex(Request $request)
    {
        $member = $this->memberCheck($request->cookie('token_members'));


        $follows = Follow::with(['client'])
            ->where('member_id', $member->id)
            ->get();

        return view(
            'member.follows',
            ['member' => $member, 'follows' => $follows]
        );
    }

    public function memberPurchase(Request $request, $id)
    {
        $member = $this->memberCheck($request->cookie('token_members')); 

        $deliveries = Delivery::select('*')
        ->where('member_id', $member->id)
        ->get();

        $product = Product::find($id);


        return view(
            'member.purchase',
            ['member' => $member, 'deliveries' => $deliveries, 'product' => $product]
        );
    }
}
