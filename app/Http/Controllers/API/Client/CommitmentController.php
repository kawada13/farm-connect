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

        $client = $this->clientCheck($request->input('token'));

        if (empty($client->id)) {
            return response()->json([
                'error' => 'ログイン必須です',
            ], 404);
        }

        $commitment = new Commitment();
        $commitment->client_id = $client->id;
        $commitment->title = $request->input('title');
        $commitment->contents = $request->input('contents');
        $commitment->commitment_url = '/images/commitment_images/' . $request->file('commitment_image')->getClientOriginalName();
        $commitment->save();
        $request->file('commitment_image')->move(base_path() . '/public/images/commitment_images', $request->file('commitment_image')->getClientOriginalName());


        return response()->json([
            'client_id' => $client->id,
            'title' => $request->input('title'),
            'contents' => $request->input('contents'),
            'token' => $request->input('token'),
        ], 200);
    }
}
