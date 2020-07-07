<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\Favorite;
use App\Model\User;

class ProductController extends Controller
{
    public function top(Request $request)
    {
        $products = Product::all();
        return view('product.top', ['products' => $products]);
    }
    public function index(Request $request)
    {
        $products = Product::all();
        return view('product.index', ['products' => $products]);
    }
    
    public function show(Request $request, $id)
    {
        $user = User::select('*')
            ->where('remember_token', $request->cookie('token_members'))
            ->first();

        $product = Product::find($id);

        $is_facvoriting = $this->is_facvoriting($user->member_id, $product->id);

        return view('product.show', ['product' => $product, 'is_facvoriting' => $is_facvoriting]);
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
