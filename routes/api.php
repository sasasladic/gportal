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

Route::prefix('v1')->group(function () {

    /*
     * Login route
     */
    Route::post('/login', 'API\UserController@login');
    Route::post('/register', 'API\UserController@register');

    Route::get('/game/all', 'API\GameController@index');
    Route::get('/server/all', 'API\ServerController@getUserServers');
    Route::get('/mod/all/{game_id}', 'API\ModController@findByGameId');

    Route::post('/contact', 'API\ContactFormController@contact');

});

Route::prefix('v1')->middleware('jwt.verify')->group(function () {
    Route::get('user', 'UserController@getAuthenticatedUser');

    Route::post('/order', 'API\OrderController@makeOrder');
});
