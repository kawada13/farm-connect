<?php

namespace App\Http\Controllers\API\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\User;
use App\Model\Category;
use App\Model\ProductCategory;
use App\config\Rule;
use Illuminate\Support\Str;

class ProductController extends Controller
{

    public function create(Request $request)
    {
        $this->validate($request, Rule::createProductRules(), Rule::createProductMessages());

        $client = $this->clientCheck($request->input('token'));

        if (empty($client->id)) {
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

        foreach($request->input('categories') as $category)
        {
            $categories = new ProductCategory();
            $categories->product_id = $product->id;
            $categories->category_id = $category;
            $categories->save();
        }


        return response()->json([
            'title' => $request->input('title'),
            'detail' => $request->input('detail'),
            'price' => $request->input('price'),
            'token' => $request->input('token'),
            'categories' => $request->input('categories'),
        ], 200);
    }

}
