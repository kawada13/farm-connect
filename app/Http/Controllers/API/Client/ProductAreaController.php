<?php

namespace App\Http\Controllers\API\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\config\Rule;

class ProductAreaController extends Controller
{
    public function create(Request $request)
    {
        

        $this->validate($request, Rule::createProductAreaRules(), Rule::createProductAreaMessages());

        $client = $this->clientCheck($request->input('token'));

        if (empty($client->id)) {
            return response()->json([
                'error' => 'ログイン必須です',
            ], 404);
        }


        $client->area_name = $request->input('area_name');
        $client->tel = $request->input('tel');
        $client->zip = $request->input('zip');
        $client->prefecture = $request->input('prefecture');
        $client->municipality = $request->input('municipality');
        $client->ward = $request->input('ward');
        $client->introduce = $request->input('introduce');
        $client->shipping = $request->input('shipping');
        $client->shipping_info = $request->input('shipping_info');
        $client->save();


        return response()->json([
            'area_name' => $request->input('area_name'),
            'tel' => $request->input('tel'),
            'zip' => $request->input('zip'),
            'prefecture' => $request->input('prefecture'),
            'municipality' => $request->input('municipality'),
            'ward' => $request->input('ward'),
            'introduce' => $request->input('introduce'),
            'shipping' => $request->input('shipping'),
            'shipping_info' => $request->input('shipping_info'),
            'token' => $request->input('token'),
        ], 200);
    }

    public function edit(Request $request)
    {
        

        $this->validate($request, Rule::createProductAreaRules(), Rule::createProductAreaMessages());

        $client = $this->clientCheck($request->input('token'));

        if (empty($client->id)) {
            return response()->json([
                'error' => 'ログイン必須です',
            ], 404);
        }


        $client->area_name = $request->input('area_name');
        $client->tel = $request->input('tel');
        $client->zip = $request->input('zip');
        $client->prefecture = $request->input('prefecture');
        $client->municipality = $request->input('municipality');
        $client->ward = $request->input('ward');
        $client->introduce = $request->input('introduce');
        $client->shipping = $request->input('shipping');
        $client->shipping_info = $request->input('shipping_info');
        $client->save();


        return response()->json([
            'area_name' => $request->input('area_name'),
            'tel' => $request->input('tel'),
            'zip' => $request->input('zip'),
            'prefecture' => $request->input('prefecture'),
            'municipality' => $request->input('municipality'),
            'ward' => $request->input('ward'),
            'introduce' => $request->input('introduce'),
            'shipping' => $request->input('shipping'),
            'shipping_info' => $request->input('shipping_info'),
            'token' => $request->input('token'),
        ], 200);
    }
}
