<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/get-user-session', 'UserSessionController@getUserSession');
Route::post('/login-user', 'UserSessionController@loginUser');

Route::resource('/user', 'UserController');
Route::resource('/item', 'ItemController');
Route::resource('/item-type', 'ItemTypeController');
