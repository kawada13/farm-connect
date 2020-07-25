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

    $user = User::select('*')
      ->where('remember_token', $request->input('token'))
      ->first();

    $follows = Member::select('*')
      ->where('id', $user->member_id)
      ->first()
      ->follows;

    $follows_ids = array();

    foreach ($follows as $follow) {
      array_push($follows_ids, $follow->client_id);
    }

    $reviews = Review::select('*');

    if (!empty($request->input('type'))) {
      if ($request->input('type') === "mine") {
        $reviews->where('member_id', $user->member_id);
      }

      if ($request->input('type') === "follows") {
        $reviews->whereIn('client_id', $follows_ids);
      }
    }

    $results = $reviews->get();

    return response()->json([
      'reviews' => $results,
      'type' => $request->input('type'),
    ], 200);
  }
}
