<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// 各ログインページ
Route::get('/login/admin', 'LoginController@indexAdmin')->name('admin.login');
Route::get('/login/client', 'LoginController@indexClient')->name('client.login');
Route::get('/login/member', 'LoginController@indexMember')->name('member.login');

// 各登録ページ
Route::get('/login/admin/create', 'LoginController@createAdmin')->name('admin.create');
Route::get('/login/client/create', 'LoginController@createClient')->name('client.create');
Route::get('/login/member/create', 'LoginController@createMember')->name('member.create');

// 各ページ
Route::get('/', 'ProductController@top')->name('products.top');
Route::get('/clients', 'UsersController@clientIndex')->name('clients.index');
Route::get('/clients/{id}', 'UsersController@clientShow')->name('clients.show');

// 商品
Route::get('/products', 'ProductController@index')->name('products.index');
Route::get('/products/{id}', 'ProductController@show')->name('product.show');



// クライアントのみ
Route::get('/client/mypage', 'UsersController@clientMypage')->name('client.mypage');
Route::get('/client/product/create', 'Client\ProductController@create')->name('product.create');
Route::get('/client/commitment/create', 'Client\CommitmentController@create')->name('commitment.create');

// メンバーのみ
Route::get('/member/profile', 'UsersController@memberShow')->name('member.show');
Route::get('/member/profile/edit', 'UsersController@memberEdit')->name('member.profile.edit');
Route::get('/member/address', 'UsersController@memberAdressIndex')->name('member.address');
Route::get('/member/address/create', 'UsersController@memberAdressCreate')->name('member.address.create');
Route::get('/member/address/{id}/edit', 'UsersController@memberAdressEdit')->name('member.address.edit');
Route::get('/member/social_setting/edit', 'UsersController@membersocialSetting')->name('member.social_setting.edit');
Route::get('/member/favorites', 'UsersController@memberFavoriteIndex')->name('member.favorite.index');

