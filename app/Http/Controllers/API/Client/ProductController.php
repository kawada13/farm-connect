<?php

namespace App\Http\Controllers\API\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\User;
use App\Model\Category;
use App\Model\ProductCategory;
use App\Model\ProductImage;
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

        foreach ($request->input('categories') as $category) {
            $categories = new ProductCategory();
            $categories->product_id = $product->id;
            $categories->category_id = $category;
            $categories->save();
        }

        if (!empty($request->file('gallery1'))) {
            $gallery = new ProductImage();
            $gallery->product_id = $product->id;
            $gallery->image_url =  '/images/product_images/' . $request->file('gallery1')->getClientOriginalName();
            $gallery->save();
            $request->file('gallery1')->move(base_path() . '/public/images/product_images', $request->file('gallery1')->getClientOriginalName());
        }
        if (!empty($request->file('gallery2'))) {
            $gallery = new ProductImage();
            $gallery->product_id = $product->id;
            $gallery->image_url =  '/images/product_images/' . $request->file('gallery2')->getClientOriginalName();
            $gallery->save();
            $request->file('gallery2')->move(base_path() . '/public/images/product_images', $request->file('gallery2')->getClientOriginalName());
        }
        if (!empty($request->file('gallery3'))) {
            $gallery = new ProductImage();
            $gallery->product_id = $product->id;
            $gallery->image_url =  '/images/product_images/' . $request->file('gallery3')->getClientOriginalName();
            $gallery->save();
            $request->file('gallery3')->move(base_path() . '/public/images/product_images', $request->file('gallery3')->getClientOriginalName());
        }
        if (!empty($request->file('gallery4'))) {
            $gallery = new ProductImage();
            $gallery->product_id = $product->id;
            $gallery->image_url =  '/images/product_images/' . $request->file('gallery4')->getClientOriginalName();
            $gallery->save();
            $request->file('gallery4')->move(base_path() . '/public/images/product_images', $request->file('gallery4')->getClientOriginalName());
        }
        if (!empty($request->file('gallery5'))) {
            $gallery = new ProductImage();
            $gallery->product_id = $product->id;
            $gallery->image_url =  '/images/product_images/' . $request->file('gallery5')->getClientOriginalName();
            $gallery->save();
            $request->file('gallery5')->move(base_path() . '/public/images/product_images', $request->file('gallery5')->getClientOriginalName());
        }

        return response()->json([
            'title' => $request->input('title'),
            'detail' => $request->input('detail'),
            'price' => $request->input('price'),
            'token' => $request->input('token'),
            'categories' => $request->input('categories'),
            'gallery1' => $request->file('gallery1')->getClientOriginalName(),
        ], 200);
    }
}
