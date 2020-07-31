<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductAreaController extends Controller
{
    public function index(Request $request)
    {
        $client = $this->clientCheck($request->cookie('token_clients'));

        if (empty($client)) {
            return redirect('/login/client');
        }

        return view('client.productArea.index', ['client' => $client]);
    }
}
