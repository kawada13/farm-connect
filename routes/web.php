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

Route::get('/login/admin', 'LoginController@indexAdmin');
Route::get('/login/client', 'LoginController@indexClient');
Route::get('/login/member', 'LoginController@indexMember');

Route::get('/login/admin/create', 'LoginController@createAdmin');
Route::get('/login/client/create', 'LoginController@createClient');
Route::get('/login/member/create', 'LoginController@createMember');

Route::get('/client/product/create', 'Client\ProductController@create');

