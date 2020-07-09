<?php

namespace App\Http\Controllers\API\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\User;
use App\config\Rule;
use Illuminate\Support\Str;

class ProductController extends Controller
{

    public function create(Request $request)
    {
        $this->validate($request, Rule::createProductRules(), Rule::createProductMessages());

        $client = $this->clientCheck($request->input('token'));

        if(empty($client->id))
        {
            return response()->json([
                'error' => 'ログイン必須です',
            ], 404);
        }
        
        $product = new Product();
        
        $product->client_id = $client->id;
        $product->title = $request->input('title');
        $product->detail = $request->input('detail');
        $product->price = $request->input('price');
        $product->save();

        
        return response()->json([
        ], 200);
    }
}
