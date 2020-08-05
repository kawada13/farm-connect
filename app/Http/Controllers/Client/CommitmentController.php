<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\Favorite;
use App\Model\User;
use App\Model\Commitment;

class CommitmentController extends Controller
{
  public function index(Request $request)
  {
    $client = $this->clientCheck($request->cookie('token_clients'));

    if (empty($client)) {
      return redirect('/login/client');
    }

    $commitments = Commitment::select('*')
    ->where('client_id', $client->id)
    ->get();

    return view('client.commitment.index', ['client' => $client, 'commitments' => $commitments]);
  }
  public function create(Request $request)
  {
    $client = $this->clientCheck($request->cookie('token_clients'));

    if (empty($client)) {
      return redirect('/login/client');
    }
    return view('client.commitment.create', ['client' => $client]);
  }
  public function edit(Request $request, $id)
  {
    $client = $this->clientCheck($request->cookie('token_clients'));

    $commitment = Commitment::find($id);

    if (empty($client)) {
      return redirect('/login/client');
    }
    return view('client.commitment.edit', ['client' => $client, 'commitment' => $commitment]);
  }

  public function show(Request $request, $id)
  {
    $client = $this->clientCheck($request->cookie('token_clients'));
    
    if (empty($client)) {
      return redirect('/login/client');
    }
    $commitment = Commitment::find($id);

    return view('client.commitment.show', ['client' => $client, 'commitment' => $commitment]);
  }
}
