<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\Favorite;
use App\Model\User;
use App\Model\Commitment;

class ProductController extends Controller
{
    public function top(Request $request)
    {

        $products = Product::with(['client'])
            ->get();

        return view('product.top', ['products' => $products]);
    }
    public function index(Request $request)
    {
        // dd($request->input('categories'));

        $title = $this->getSearchTitle($request);

        $clients_url = str_replace('products', 'clients', $request->fullUrl());

        $products = Product::with(['client'])
            ->whereHas('client', function ($query) use ($request) {
                $query->where('name', 'like', "%{$request->input('keyword')}%");
            })
            ->orWhere('title', 'like', "%{$request->input('keyword')}%")
            ->orWhere('detail', 'like', "%{$request->input('keyword')}%")
            ->get();

        return view('product.index', ['products' => $products, 'title' => $title, 'clients_url' => $clients_url]);
    }

    public function show(Request $request, $id)
    {
        $user = User::select('*')
            ->where('remember_token', $request->cookie('token_members'))
            ->first();

        $product = Product::find($id);

        $is_facvoriting = $this->is_facvoriting($user->member_id, $product->id);

        $commitments = Commitment::select('*')
            ->where('client_id', $product->client_id)
            ->get();

        return view('product.show', ['product' => $product, 'is_facvoriting' => $is_facvoriting, 'commitments' => $commitments]);
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
