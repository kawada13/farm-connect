<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function indexAdmin()
    {
        return view('login.admin.index');
    }
    public function indexClient()
    {
        return view('login.client.index');
    }
    public function indexMember()
    {
        return view('login.member.index');
    }

    public function createAdmin()
    {
        return view('login.admin.create');
    }
    public function createClient()
    {
        return view('login.client.create');
    }
    public function createMember()
    {
        return view('login.member.create');
    }
}
