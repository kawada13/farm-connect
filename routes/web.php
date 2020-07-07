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

// トップページ
Route::get('/', 'ProductController@top')->name('products.top');

// 商品
Route::get('/products', 'ProductController@index')->name('products.index');
Route::get('/products/{id}', 'ProductController@show')->name('product.show');

// クライアント
Route::get('/client/profile', 'UsersController@clientShow')->name('client.show');
Route::get('/client/product/create', 'Client\ProductController@create')->name('product.create');

// メンバー
Route::get('/member/profile', 'UsersController@memberShow')->name('member.show');
Route::get('/member/profile/edit', 'UsersController@memberEdit')->name('member.profile.edit');
Route::get('/member/address', 'UsersController@memberAdressIndex')->name('member.address');
Route::get('/member/address/create', 'UsersController@memberAdressCreate')->name('member.address.create');
Route::get('/member/address/{id}/edit', 'UsersController@memberAdressEdit')->name('member.address.edit');
Route::get('/member/social_setting/edit', 'UsersController@membersocialSetting')->name('member.social_setting.edit');

