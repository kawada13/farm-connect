<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// 各ログイン
Route::post('/login', 'API\LoginController@login');

// 各登録
Route::post('/login/admin/create', 'API\LoginController@createAdmin');
Route::post('/login/client/create', 'API\LoginController@createClient');
Route::post('/login/member/create', 'API\LoginController@createMember');

// クライアント
Route::post('/client/product/create', 'API\Client\ProductController@create');

// メンバー
Route::post('/member/profile/edit', 'API\UsersController@updateMemberProfile');
Route::post('/member/address/create', 'API\UsersController@createMemberAddress');