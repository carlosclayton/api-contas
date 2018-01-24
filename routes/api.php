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

ApiRoute::version('v1', function () {
    ApiRoute::group([
        'namespace' => 'ApiContas\Http\Controllers', 'as' => 'api',
        'middleware' => 'api.throttle',
        'limit' => 100,
        'expires' => 5
    ], function () {
        ApiRoute::post('access_token', 'AuthController@accessToken')->name('.access_token');
        ApiRoute::group([
            'middleware' => 'api.auth'
        ], function () {
            ApiRoute::get('users', 'UsersController@index')->name('.users');
            ApiRoute::resource('bills', 'BillsController');
            ApiRoute::post('/logout', 'AuthController@logout')->name('.logout');
            ApiRoute::post('/refresh_token', 'AuthController@refreshToken')->name('.refresh_token');
            ApiRoute::post('/user', 'AuthController@user')->name('.user');
        });
    });
});



