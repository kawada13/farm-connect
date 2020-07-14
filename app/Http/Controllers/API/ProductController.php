<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use App\Model\User;
use App\Model\Admin;
use App\Model\Client;
use App\Model\Member;
use Illuminate\Validation\ValidationException;
use App\config\Rule;
use Illuminate\Support\Str;

class ProductController extends Controller
{
  public function index(Request $request)
  {
    // $route = new Redirector();
    // Redirector()->route('products', [
    //   'keyword' => $request->input('keyword', ''),
    //   'categories' => $request->input('categories', ''),
    // ]);
  }

}
