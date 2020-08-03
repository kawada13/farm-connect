<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\Favorite;
use App\Model\User;
use App\Model\Category;
use App\Model\Delivery;
use App\Model\ProductCategory;
use App\Model\ProductImage;
use App\Model\Purchase;
use Illuminate\Support\Facades\DB;

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
    $client = $this->clientCheck($request->cookie('token_clients'));

    if (empty($client)) {
      return redirect('/login/client');
    }

    $products = Product::select('*')
      ->where('client_id', $client->id)
      ->get();

    $categories = Category::all();

    return view('client.product.index', ['products' => $products, 'client' => $client, 'categories' => $categories]);
  }

  public function show(Request $request, $id)
  {
    $client = $this->clientCheck($request->cookie('token_clients'));

    if (empty($client)) {
      return redirect('/login/client');
    }

    $product = Product::find($id);

    $images = ProductImage::select('*')
      ->where('product_id', $id)
      ->get();


    return view('client.product.show', ['product' => $product, 'client' => $client, 'images' => $images]);
  }

  public function edit(Request $request, $id)
  {
    $client = $this->clientCheck($request->cookie('token_clients'));

    if (empty($client)) {
      return redirect('/login/client');
    }

    $product = Product::find($id);

    $images = ProductImage::select('*')
      ->where('product_id', $id)
      ->get();

    $categories = Category::all();

    $productCategories = ProductCategory::select('*')
      ->where('product_id', $id)
      ->get();


    return view('client.product.edit', ['product' => $product, 'client' => $client, 'images' => $images, 'categories' => $categories, 'productCategories' => $productCategories]);
  }

  public function create(Request $request)
  {
    $client = $this->clientCheck($request->cookie('token_clients'));

    if (empty($client)) {
      return redirect('/login/client');
    }

    $categories = Category::all();

    // dd($categories);

    return view('client.product.create', ['client' => $client, 'categories' => $categories]);
  }

  public function notOrder(Request $request)
  {
    $client = $this->clientCheck($request->cookie('token_clients'));

    if (empty($client)) {
      return redirect('/login/client');
    }

    $purchases = Purchase::with(['product'])
      ->whereExists(function ($query) use ($request, $client) {
        $query->select(DB::raw(1))
          ->from('products')
          ->whereRaw('purchases.product_id = products.id')
          ->where('products.client_id', $client->id);
      })
      ->where('purchases.is_shipping', 0)
      ->get();

    foreach ($purchases as &$purchase) {
      if (empty($purchase->delivery)) {
        $purchase->delivery = Delivery::where('member_id', $purchase->member_id)
          ->orderBy('updated_at', 'desc')
          ->first();
      }
    }

    return view('client.product.notorder', ['client' => $client, 'purchases' => $purchases]);
  }

  public function notOrderShow(Request $request, $id)
  {
    $client = $this->clientCheck($request->cookie('token_clients'));

    if (empty($client)) {
      return redirect('/login/client');
    }

    $purchase = Purchase::with(['delivery'])
      ->where('id', $id)
      ->first();

    if (empty($purchase->delivery)) {
      $purchase->delivery = Delivery::where('member_id', $purchase->member_id)
        ->orderBy('updated_at', 'desc')
        ->first();
    }

    return view('client.product.notorderShow', ['client' => $client, 'purchase' => $purchase]);
  }

  public function order(Request $request)
  {
    $client = $this->clientCheck($request->cookie('token_clients'));

    if (empty($client)) {
      return redirect('/login/client');
    }

    $purchases = Purchase::with(['product'])
      ->whereExists(function ($query) use ($request, $client) {
        $query->select(DB::raw(1))
          ->from('products')
          ->whereRaw('purchases.product_id = products.id')
          ->where('products.client_id', $client->id);
      })
      ->where('purchases.is_shipping', 1)
      ->get();

    return view('client.product.order', ['client' => $client, 'purchases' => $purchases]);
  }
}
