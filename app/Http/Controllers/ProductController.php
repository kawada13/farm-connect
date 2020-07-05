<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;

class ProductController extends Controller
{
    public function index(Request $request) 
    {
        $products = Product::all();
        return view('product.index', ['products' => $products]);
    }
    public function show(Request $request, $id) 
    {
        $product = Product::find($id);
        return view('product.show', ['product' => $product]);
    }

}
