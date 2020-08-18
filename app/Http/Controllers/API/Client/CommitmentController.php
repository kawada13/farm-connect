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

        if (!empty($request->file('commitment_image'))) {
            $commitment->commitment_url = '/images/commitment_images/' . $request->file('commitment_image')->getClientOriginalName();
            $request->file('commitment_image')->move(base_path() . '/public/images/commitment_images', $request->file('commitment_image')->getClientOriginalName());
        }
        $commitment->save();


        return response()->json([
            'client_id' => $client->id,
            'title' => $request->input('title'),
            'contents' => $request->input('contents'),
            'token' => $request->input('token'),
        ], 200);
    }

    public function edit(Request $request)
    {

        $this->validate($request, Rule::createCommitmentRules(), Rule::createCommitmentMessages());


        $client = $this->clientCheck($request->input('token'));

        if (empty($client->id)) {
            return response()->json([
                'error' => 'ログイン必須です',
            ], 404);
        }

        $commitment = Commitment::find($request->input('commitment_id'));
        $commitment->client_id = $client->id;
        $commitment->title = $request->input('title');
        $commitment->contents = $request->input('contents');

        if (!empty($request->file('commitment_image'))) {
            $commitment->commitment_url = '/images/commitment_images/' . $request->file('commitment_image')->getClientOriginalName();
            $request->file('commitment_image')->move(base_path() . '/public/images/commitment_images', $request->file('commitment_image')->getClientOriginalName());
        }

        $commitment->save();



        return response()->json([
            'client_id' => $client->id,
            'title' => $request->input('title'),
            'contents' => $request->input('contents'),
            'token' => $request->input('token'),
            'commitment_id' => $request->input('commitment_id'),
        ], 200);
    }


    public function delete(Request $request)
    {

        $client = $this->clientCheck($request->input('token'));

        if (empty($client->id)) {
            return response()->json([
                'error' => 'ログイン必須です',
            ], 404);
        }

        $commitment = Commitment::where('id', $request->input('commitment_id'))
            ->delete();


        return response()->json([
            'token' => $request->input('token'),
            'commitment_id' => $request->input('commitment_id'),
        ], 200);
    }
}
