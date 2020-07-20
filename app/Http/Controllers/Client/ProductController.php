<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\Favorite;
use App\Model\User;
use App\Model\Category;
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
    $products = Product::with(['client'])
      ->get();
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
      ->whereExists(function ($query) use ($request) {
        $query->select(DB::raw(1))
          ->from('products')
          ->whereRaw('purchases.product_id = products.id')
          ->where('purchases.is_shipping', 0);
      })
      ->get();


    return view('client.product.notorder', ['client' => $client, 'purchases' => $purchases]);
  }

  public function notOrderShow(Request $request, $id)
  {
    $client = $this->clientCheck($request->cookie('token_clients'));

    if (empty($client)) {
      return redirect('/login/client');
    }

    $purchase = Purchase::find($id);


    return view('client.product.notorderShow', ['client' => $client, 'purchase' => $purchase]);
  }
}
