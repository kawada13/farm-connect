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
// 各ログイン,ログアウト
Route::post('/login', 'API\LoginController@login');

// 各登録
Route::post('/login/admin/create', 'API\LoginController@createAdmin');
Route::post('/login/client/create', 'API\LoginController@createClient');
Route::post('/login/member/create', 'API\LoginController@createMember');

// クライアント
Route::post('/client/product/create', 'API\Client\ProductController@create');
Route::post('/client/commitment/create', 'API\Client\CommitmentController@create');

// メンバー
Route::post('/member/profile/edit', 'API\UsersController@updateMemberProfile');
Route::post('/member/address/create', 'API\UsersController@createMemberAddress');
Route::post('/member/address/edit', 'API\UsersController@editMemberAddress');
Route::post('/member/address/delete', 'API\UsersController@deleteMemberAddress');
Route::post('/member/password/edit', 'API\UsersController@editMemberPassword');
Route::post('/member/favorite', 'API\UsersController@favorite');
Route::post('/member/unfavorite', 'API\UsersController@unfavorite');
Route::post('/member/follow', 'API\UsersController@follow');
Route::post('/member/unfollow', 'API\UsersController@unfollow');