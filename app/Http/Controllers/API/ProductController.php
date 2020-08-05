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
use App\Model\Review;
use Illuminate\Validation\ValidationException;
use App\config\Rule;
use App\Model\Follow;
use App\Model\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
  public function review(Request $request)
  {

    $member = $this->memberCheck($request->input('token'));

    if (empty($member->id)) {
      return response()->json([
        'error' => 'ログイン必須です',
      ], 404);
    }
    
    $user = User::select('*')
      ->where('remember_token', $request->input('token'))
      ->first();

    $followIds = Follow::select('*')
      ->where('member_id', $user->member_id)
      ->pluck('client_id')
      ->toArray();

    $reviews = Review::with(['product']);

    if (!empty($request->input('type'))) {
      if ($request->input('type') === "mine") {
        $reviews->where('member_id', $user->member_id);
      }

      if ($request->input('type') === "follows") {
        $reviews->whereIn('client_id', $followIds);
      }
    }

    $results = $reviews->get();

    return response()->json([
      'reviews' => $results,
      'type' => $request->input('type'),
    ], 200);
  }
}
