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
use App\Model\Follow;
use App\Model\Purchase;

class UsersController extends Controller
{
    public function updateMemberProfile(Request $request)
    {
        $this->validate($request, Rule::editMemberRules(), Rule::editMemberMessages());

        $member = $this->memberCheck($request->input('token'));

        if (empty($member->id)) {
            return response()->json([
                'error' => 'ログイン必須です',
            ], 404);
        }
        $member->profile_url = '/images/member_profile/' . $request->file('profile_image')->getClientOriginalName();
        $member->name = $request->input('name');
        $member->email = $request->input('email');
        $member->save();
        $request->file('profile_image')->move(base_path() . '/public/images/member_profile', $request->file('profile_image')->getClientOriginalName());

        return response()->json([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ], 200);
    }

    public function createMemberAddress(Request $request)
    {
        $this->validate($request, Rule::createMemberDeliveryRules(), Rule::createMemberDeliveryMessages());

        $member = $this->memberCheck($request->input('token'));

        if (empty($member->id)) {
            return response()->json([
                'error' => 'ログイン必須です',
            ], 404);
        }

        $delinfo = new Delivery();
        $delinfo->name = $request->input('name');
        $delinfo->zip = $request->input('zip');
        $delinfo->prefecture = $request->input('prefecture');
        $delinfo->municipality = $request->input('municipality');
        $delinfo->tel = $request->input('tel');
        $delinfo->member_id = $member->id;
        $delinfo->save();


        return response()->json([
            'name' => $request->input('name'),
            'zip' => $request->input('zip'),
            'prefecture' => $request->input('prefecture'),
            'municipality' => $request->input('municipality'),
            'tel' => $request->input('tel'),
        ], 200);
    }
    public function editMemberAddress(Request $request)
    {
        $this->validate($request, Rule::createMemberDeliveryRules(), Rule::createMemberDeliveryMessages());

        $member = $this->memberCheck($request->input('token'));

        if (empty($member->id)) {
            return response()->json([
                'error' => 'ログイン必須です',
            ], 404);
        }

        $delinfo = Delivery::where('id', $request->input('deliveryId'))->first();
        $delinfo->name = $request->input('name');
        $delinfo->zip = $request->input('zip');
        $delinfo->prefecture = $request->input('prefecture');
        $delinfo->municipality = $request->input('municipality');
        $delinfo->tel = $request->input('tel');
        $delinfo->member_id = $member->id;
        $delinfo->save();


        return response()->json([
            'name' => $request->input('name'),
            'zip' => $request->input('zip'),
            'prefecture' => $request->input('prefecture'),
            'tel' => $request->input('tel'),
        ], 200);
    }

    public function deleteMemberAddress(Request $request)
    {

        $member = $this->memberCheck($request->input('token'));

        if (empty($member->id)) {
            return response()->json([
                'error' => 'ログイン必須です',
            ], 404);
        }

        $delinfo = Delivery::where('id', $request->input('deliveryId'))
            ->delete();

        return response()->json([], 200);
    }

    public function editMemberPassword(Request $request)
    {
        $this->validate($request, Rule::editMemberPasswordRules(), Rule::editMemberPasswordMessages());

        $user = User::select('*')
            ->where('remember_token', $request->input('token'))
            ->first();

        $member = $this->memberCheck($request->input('token'));

        if (empty($member->id)) {
            return response()->json([
                'error' => 'ログイン必須です',
            ], 404);
        }

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

        if (empty($user->member_id)) {
            return response()->json([
                'error' => 'ログイン必須です',
            ], 404);
        }

        $favorite = Favorite::where('member_id', $user->member_id)
            ->where('product_id', $request->input('product_id'))
            ->first();

        if (!empty($favorite->id)) {
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


    public function follow(Request $request)
    {
        $user = User::select('*')
            ->where('remember_token', $request->input('token'))
            ->first();

        if (empty($user->member_id)) {
            return response()->json([
                'error' => 'ログイン必須です',
            ], 404);
        }

        $follow = Follow::where('member_id', $user->member_id)
            ->where('client_id', $request->input('client_id'))
            ->first();

        if (!empty($follow->id)) {
            return response()->json([
                'error' => '登録済です',
            ], 404);
        }

        $follow = new Follow();
        $follow->member_id = $user->member_id;
        $follow->client_id = $request->input('client_id');
        $follow->save();

        return response()->json([
            'token' => $request->input('token'),
            'client_id' => $request->input('client_id'),
        ], 200);
    }

    public function unfollow(Request $request)
    {
        $user = User::select('*')
            ->where('remember_token', $request->input('token'))
            ->first();

        $follow = Follow::select('*')
            ->where('member_id', $user->member_id)
            ->where('client_id', $request->input('client_id'))
            ->delete();

        return response()->json([
            'token' => $request->input('token'),
            'client_id' => $request->input('client_id'),
        ], 200);
    }
    public function purcase(Request $request)
    {

        $this->validate($request, Rule::purchaseRules(), Rule::purchaseMessages());

        $user = User::select('*')
            ->where('remember_token', $request->input('token'))
            ->first();

        if (empty($user->member_id)) {
            return response()->json([
                'error' => 'ログイン必須です',
            ], 404);
        }

        $purchase = new Purchase();
        $purchase->member_id = $user->member_id;
        $purchase->product_id = $request->input('product_id');
        $purchase->delivery_id = $request->input('delivery_id');
        $purchase->price = $request->input('price');
        $purchase->number = $request->input('number');
        $purchase->is_shipping = 0;
        $purchase->shipping = $request->input('shipping');
        $purchase->save();

        return response()->json([

            'member_id' => $user->member_id,
            'token' => $request->input('token'),
            'product_id' => $request->input('product_id'),
            'product_price' => $request->input('product_price'),
            'shipping' => $request->input('shipping'),
            'delivery' => $request->input('delivery_id'),
        ], 200);
    }

    public function shipment(Request $request)
    {
        $user = User::select('*')
            ->where('remember_token', $request->input('token'))
            ->first();

        if (empty($user->client_id)) {
            return response()->json([
                'error' => 'ログイン必須です',
            ], 404);
        }

        $purchase = Purchase::find($request->input('purchaseId'));
        $purchase->is_shipping = 1;
        $purchase->save();

        return response()->json([
            'token' => $request->input('token'),
            'purchase_id' => $request->input('purchaseId'),
        ], 200);
    }
}
