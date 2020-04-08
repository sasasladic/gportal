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


Route::prefix('v1')->group(function ()
{
    /*
     * Auth routes
     */
    Route::post('/login', 'API\Auth\AuthController@login');
    Route::post('/register', 'API\Auth\AuthController@register');

    /*
     * Password problems
     */
    Route::post('password/email', 'API\Auth\ForgotPasswordController@sendResetLinkEmail');
    Route::post('password/reset', 'API\Auth\ResetPasswordController@reset');

    /*
      * Verify email
      */
    Route::get('email/verify/{id}/{hash}', 'API\Auth\VerificationController@verify')->name('verification.verify');
    Route::get('email/resend', 'API\Auth\VerificationController@resend')->name('verification.resend');

    /*
     * Game routes
     */
    Route::get('/game/all', 'API\GameController@index');
    Route::get('/game/{game}', 'API\GameController@show');


    /*
     * Server routes
     */
    //Dostupni serveri za tu igricu
    Route::get('/server/all/{gameId}', 'API\ServerController@getGameAvailableServers');
    Route::get('/machines/all', 'API\ServerController@getAllMachines');
    Route::get('/server/{machineId}/{gameId}', 'API\ServerController@findByMachineAndGame');


    Route::get('/mod/all/{game_id}', 'API\ModController@findByGameId');

    Route::post('/contact', 'API\ContactFormController@contact');

});

Route::prefix('v1')->middleware('auth:api')->group(function ()
{

    Route::post('/order', 'API\OrderController@makeOrder');

    /*
     * User routes
     */
    Route::get('/user/profile', 'API\Auth\AuthController@getAuthenticatedUser');
    Route::post('/user/profile/update', 'API\UserController@updateProfile');
    Route::get('/user/servers/all', 'API\UserController@getUserServers');
});
