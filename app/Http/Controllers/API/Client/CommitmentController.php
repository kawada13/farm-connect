<?php

namespace App\Http\Controllers\API\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\Commitment;
use App\Model\User;
use App\config\Rule;
use Illuminate\Support\Str;

class CommitmentController extends Controller
{

    public function create(Request $request)
    {
        $this->validate($request, Rule::createCommitmentRules(), Rule::createCommitmentMessages());

        // クライアントチェック
        $client_id = User::select('*')
        ->where('remember_token', $request->input('token'))
        ->first()
        ->client_id;
        
        $commitment = new Commitment();
        
        $commitment->client_id = $client_id;
        $commitment->title = $request->input('title');
        $commitment->contents = $request->input('contents');
        $commitment->save();

        
        return response()->json([
          'client_id' => $client_id,
          'title' => $request->input('title'),
          'contents' => $request->input('contents'),
          'token' => $request->input('token'),
      ], 200);
    }
}
