<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\Favorite;
use App\Model\User;
use App\Model\Client;
use App\Model\Commitment;
use App\Model\Review;
use App\Model\ProductImage;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function top(Request $request)
    {
        $client = $this->clientCheck($request->cookie('token_clients'));
        if (!empty($client)) {
            return redirect('/login/member');
        }

        $products = Product::with(['productImages'])
            ->get();


        $reviews = Review::select('*')
            ->orderBy('id', 'desc')
            ->limit(4)
            ->get();

        return view('product.top', ['products' => $products, 'reviews' => $reviews]);
    }
    public function index(Request $request)
    {
        $client = $this->clientCheck($request->cookie('token_clients'));
        if (!empty($client)) {
            return redirect('/login/member');
        }

        $title = $this->getSearchTitle($request);

        $clients_url = str_replace('products', 'clients', $request->fullUrl());


        $products = Product::select('*')

            ->when(!empty($request->input('categories')), function ($query) use ($request) {
                return $query->whereExists(function ($query) use ($request) {
                    $query->select(DB::raw(1))
                        ->from('product_categories')
                        ->whereRaw('product_categories.product_id = products.id')
                        ->whereIn('product_categories.category_id', $request->input('categories'));
                });
            })
            ->when(!empty($request->input('keyword')), function ($query) use ($request) {
                return $query
                    ->where('title', 'like', "%{$request->input('keyword')}%")
                    ->orWhere('detail', 'like', "%{$request->input('keyword')}%");
            })
            ->when(!empty($request->input('prefectures')), function ($query) use ($request) {
                return $query->whereExists(function ($query) use ($request) {
                    $query->select(DB::raw(1))
                        ->from('clients')
                        ->whereRaw('clients.id = products.client_id')
                        ->whereIn('clients.prefecture', $request->input('prefectures'));
                });
            })
            ->get();

        return view('product.index', ['products' => $products, 'title' => $title, 'clients_url' => $clients_url]);
    }

    public function show(Request $request, $id)
    {

        $user = User::select('*')
            ->where('remember_token', $request->cookie('token_members'))
            ->first();

        $product = Product::find($id);

        $products = Product::select('*')
            ->where('client_id', $product->client->id)
            ->get();


        $reviews = Review::with(['product'])
            ->where('product_id', $id)
            ->get();

        if (!empty($user)) {
            $is_facvoriting = $this->is_facvoriting($user->member_id, $product->id);
        }

        $commitments = Commitment::select('*')
            ->where('client_id', $product->client_id)
            ->get();

        $images = ProductImage::select('*')
            ->where('product_id', $id)
            ->get();

        if (!empty($user)) {
            return view('product.show', ['product' => $product, 'is_facvoriting' => $is_facvoriting, 'commitments' => $commitments, 'products' => $products, 'reviews' => $reviews, 'images' => $images]);
        } else {
            return view('product.show', ['product' => $product,'commitments' => $commitments, 'products' => $products, 'reviews' => $reviews, 'images' => $images]);
        }
    }

    public function is_facvoriting($memberId, $productId)
    {
        return
            Favorite::select('*')
            ->where('member_id', $memberId)
            ->where('product_id', $productId)
            ->first();
    }
}
