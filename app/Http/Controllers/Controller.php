<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Model\User;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function memberCheck($token)
    {
        $user = User::with(['member'])
        ->where('remember_token', $token)
        ->first();

        if(empty($user) || empty($user->member)) 
        {
            return false;
        }
        return $user->member;
    }
}
