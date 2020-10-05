<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\Favorite;
use App\Model\User;
use App\Model\Category;
use App\Model\Client;
use App\Model\Commitment;
use App\Model\Delivery;
use App\Model\ProductCategory;
use App\Model\ProductImage;
use App\Model\Purchase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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


    $productCategories = ProductCategory::where('product_id', $id)->get();

    return view('client.product.show', ['product' => $product, 'client' => $client, 'images' => $images, 'productCategories' => $productCategories,]);
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
      ->pluck('category_id')
      ->toArray();


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

    $delivery = Delivery::withTrashed()
      ->where('id', $purchase->delivery_id)
      ->first();

    return view('client.product.notorderShow', ['client' => $client, 'purchase' => $purchase, 'delivery' => $delivery]);
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

  public function imageupload(Request $request, $id)

  {
    $client = $this->clientCheck($request->cookie('token_clients'));

    if (empty($client)) {
      return redirect('/login/client');
    }

    $product = Product::find($id);

    return view('client.product.imageupload', ['client' => $client, 'product' => $product]);
  }


  public function imagecomplete(Request $request, $id)

  {

    $client = $this->clientCheck($request->cookie('token_clients'));

    if (empty($client)) {
      return redirect('/login/client');
    }

    if (!empty($request->file('gallery1'))) {
      $image = new ProductImage();
      $uploadImg = $image->image_url= $request->file('gallery1');
      $path = Storage::disk('s3')->putFile('/', $uploadImg, 'public');
      $image->image_url = Storage::disk('s3')->url($path);
      $image->product_id = $request->product_id;
      $image->save();
    }
    if (!empty($request->file('gallery2'))) {
      $image = new ProductImage();
      $uploadImg = $image->image_url= $request->file('gallery2');
      $path = Storage::disk('s3')->putFile('/', $uploadImg, 'public');
      $image->image_url = Storage::disk('s3')->url($path);
      $image->product_id = $request->product_id;
      $image->save();
    }
    if (!empty($request->file('gallery3'))) {
      $image = new ProductImage();
      $uploadImg = $image->image_url= $request->file('gallery3');
      $path = Storage::disk('s3')->putFile('/', $uploadImg, 'public');
      $image->image_url = Storage::disk('s3')->url($path);
      $image->product_id = $request->product_id;
      $image->save();
    }
    if (!empty($request->file('gallery4'))) {
      $image = new ProductImage();
      $uploadImg = $image->image_url= $request->file('gallery4');
      $path = Storage::disk('s3')->putFile('/', $uploadImg, 'public');
      $image->image_url = Storage::disk('s3')->url($path);
      $image->product_id = $request->product_id;
      $image->save();
    }
    if (!empty($request->file('gallery5'))) {
      $image = new ProductImage();
      $uploadImg = $image->image_url= $request->file('gallery5');
      $path = Storage::disk('s3')->putFile('/', $uploadImg, 'public');
      $image->image_url = Storage::disk('s3')->url($path);
      $image->product_id = $request->product_id;
      $image->save();
    }


    $product = Product::find($id);

    $images = ProductImage::select('*')
      ->where('product_id', $id)
      ->get();

    $productCategories = ProductCategory::where('product_id', $id)->get();

    return redirect(route('client_product.show', [
      'id' => $product->id,
    ]));
  }

  public function profileimagecomplete(Request $request)
  {
    // dd($request->name);

    $client = $this->clientCheck($request->cookie('token_clients'));

    if (empty($client)) {
      return redirect('/login/client');
    }

    if (!empty($request->file('gallery1'))) {

      $uploadImg = $client->client_url = $request->file('gallery1');
      $path = Storage::disk('s3')->putFile('/', $uploadImg, 'public');
      $client->client_url = Storage::disk('s3')->url($path);
      $client->name = $request->name;
      $client->email = $request->email;
      $client->save();
    }

    return redirect(route('client.profile'));
  }

  public function commitmentimagecomplete(Request $request)
  {
    // dd($request->id);

    $client = $this->clientCheck($request->cookie('token_clients'));

    if (empty($client)) {
      return redirect('/login/client');
    }

    if (!empty($request->file('image'))) {
      $commitment = Commitment::find($request->id);
      $uploadImg = $commitment->commitment_url = $request->file('image');
      $path = Storage::disk('s3')->putFile('/', $uploadImg, 'public');
      $commitment->commitment_url = Storage::disk('s3')->url($path);
      $commitment->save();
    }

    return redirect(route('commitment.show', [
      'id' => $commitment->id,
    ]));
  }
}
