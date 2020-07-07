<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;

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
        $product = Product::find($id);
        return view('client.product.show', ['product' => $product]);
    }

    public function create()
    {
        return view('client.product.create');
    }
}
