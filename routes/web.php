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
Route::get('/reviews', 'UsersController@reviewIndex')->name('reviews.index');

// 商品
Route::get('/products', 'ProductController@index')->name('products.index');
Route::get('/products/{id}', 'ProductController@show')->name('product.show');



// クライアントのみ
Route::get('/client/mypage', 'UsersController@clientMypage')->name('client.mypage');
Route::get('/client/profile', 'UsersController@clientProfile')->name('client.profile');
Route::get('/client/product/create', 'Client\ProductController@create')->name('product.create');
Route::get('/client/commitment/index', 'Client\CommitmentController@index')->name('commitment.index');
Route::get('/client/commitment/create', 'Client\CommitmentController@create')->name('commitment.create');
Route::get('/client/commitment/{id}/edit', 'Client\CommitmentController@edit')->name('commitment.edit');
Route::get('/client/product/notordering', 'Client\ProductController@notOrder')->name('product.notordering');
Route::get('/client/product/ordering', 'Client\ProductController@order')->name('product.ordering');
Route::get('/client/product/notordering/{id}', 'Client\ProductController@notOrderShow')->name('notordering.show');
Route::get('/client/product_area', 'Client\ProductAreaController@index')->name('product_area.index');
Route::get('/client/product_area/edit', 'Client\ProductAreaController@edit')->name('product_area.edit');
Route::get('/client/products', 'Client\ProductController@index')->name('client_product.index');
Route::get('/client/products/{id}', 'Client\ProductController@show')->name('client_product.show');
Route::get('/client/products/{id}/edit', 'Client\ProductController@edit')->name('client_product.edit');

// メンバーのみ
Route::get('/member/profile', 'UsersController@memberShow')->name('member.show');
Route::get('/member/profile/edit', 'UsersController@memberEdit')->name('member.profile.edit');
Route::get('/member/address', 'UsersController@memberAdressIndex')->name('member.address');
Route::get('/member/address/create', 'UsersController@memberAdressCreate')->name('member.address.create');
Route::get('/member/address/{id}/edit', 'UsersController@memberAdressEdit')->name('member.address.edit');
Route::get('/member/social_setting/edit', 'UsersController@membersocialSetting')->name('member.social_setting.edit');
Route::get('/member/favorites', 'UsersController@memberFavoriteIndex')->name('member.favorite.index');
Route::get('/member/follows', 'UsersController@memberFollowIndex')->name('member.follow.index');
Route::get('/products/{id}/purchase', 'UsersController@memberPurchase')->name('member.purchase');
Route::get('/member/purchase/history', 'UsersController@purchaseHistory')->name('purchase.history');
Route::get('/member/product/{id}/review/create', 'UsersController@reviewCreate')->name('member.review');

