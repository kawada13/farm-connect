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

        if (empty($user) || empty($user->member)) {
            return false;
        }
        return $user->member;
    }
    public function clientCheck($token)
    {
        $user = User::with(['client'])
            ->where('remember_token', $token)
            ->first();

        if (empty($user) || empty($user->client)) {
            return false;
        }
        return $user->client;
    }

    public function getSearchTitle($request)
    {
        if ($request->path() === "products") {
            $title = 'すべての商品';
            if (!empty($request->input('keyword'))) {
                $title = $request->input('keyword') . 'の検索結果';
            }
            if (!empty($request->input('categories'))) {

                $title = '';
                $keyFirst = array_key_first($request->input('categories'));

                foreach ($request->input('categories') as $key => $value) {
                    if ($key === $keyFirst) {
                        $title .= $value;
                    } else {
                        $title .= '/' . $value;
                    }
                }
                $title = '検索結果';
            }
            if (!empty($request->input('prefectures'))) {

                $title = '';
                $keyFirst = array_key_first($request->input('prefectures'));

                foreach ($request->input('prefectures') as $key => $value) {
                    if ($key === $keyFirst) {
                        $title .= $value;
                    } else {
                        $title .= '/' . $value;
                    }
                }
                $title .= '検索結果';
            }
        }

        if ($request->path() === "clients") {
            $title = 'すべての生産者';
            if (!empty($request->input('keyword'))) {
                $title = $request->input('keyword') . 'の検索結果';
            }

            if (!empty($request->input('categories'))) {

                $title = '';
                $keyFirst = array_key_first($request->input('categories'));

                foreach ($request->input('categories') as $key => $value) {
                    if ($key === $keyFirst) {
                        $title .= $value;
                    } else {
                        $title .= '/' . $value;
                    }
                }
                $title = '検索結果';
            }
            if (!empty($request->input('prefectures'))) {

                $title = '';
                $keyFirst = array_key_first($request->input('prefectures'));

                foreach ($request->input('prefectures') as $key => $value) {
                    if ($key === $keyFirst) {
                        $title .= $value;
                    } else {
                        $title .= '/' . $value;
                    }
                }
                $title .= '検索結果';
            }
        }

        return $title;
    }
}
