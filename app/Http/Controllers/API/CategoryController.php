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
use App\Model\Category;
use Illuminate\Validation\ValidationException;
use App\config\Rule;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
  public function index(Request $request)
  {
    $categories = Category::all();

    $prefs = config('prefectures');

    return response()->json([
      'categories' => $categories,
      'prefs' => $prefs,
  ], 200);
  }

}
