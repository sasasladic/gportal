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

Route::prefix('v1')->group(function ()
{
    /*
     * Auth routes
     */
    Route::post('/login', 'API\Auth\AuthController@login');
    Route::post('/register', 'API\Auth\AuthController@register');

    /*
      * Verify email
      */
    Route::get('email/verify/{id}/{hash}', 'API\Auth\VerificationController@verify')->name('verification.verify');
    Route::get('email/resend', 'API\Auth\VerificationController@resend')->name('verification.resend');


    Route::get('/game/all', 'API\GameController@index');

    Route::get('/server/all', 'API\ServerController@getUserServers');
    Route::get('/mod/all/{game_id}', 'API\ModController@findByGameId');

    Route::post('/contact', 'API\ContactFormController@contact');

});

Route::prefix('v1')->middleware('auth:api')->group(function ()
{

    Route::get('user', 'API\UserController@getAuthenticatedUser');

    Route::post('/user/profile/update', 'API\UserController@updateProfile');

    Route::post('/order', 'API\OrderController@makeOrder');
});
