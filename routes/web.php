<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('profile', function () {
    // Only verified users may enter...
})->middleware('verified');

Route::prefix('dashboard')->middleware('verified','authentication:Admin')->group(function () {

    /*
     * Home route
     */
    Route::get('/home', 'HomeController@index')->name('home');

    /*
     * User routes
     */
    Route::get('/user/all', 'Admin\UserController@index')->name('user.index');
    Route::get('/user/edit/{user}', 'Admin\UserController@edit')->name('user.edit');
    Route::patch('/user/edit/{user}', 'Admin\UserController@update')->name('user.update');
    Route::get('/user/remove/{user}', 'Admin\UserController@destroy')->name('user.destroy');
    Route::get('/user/create', 'Admin\UserController@create')->name('user.create');
    Route::post('/user/create', 'Admin\UserController@store')->name('user.store');

    /*
     * Ticket routes
     */
    Route::get('/ticket/all', 'Admin\TicketController@index')->name('ticket.index');
    Route::get('/ticket/show/{ticket}', 'Admin\TicketController@show')->name('ticket.show');

    /*
     * Game routes
     */
    Route::get('/game/create', 'Admin\GameController@create')->name('game.create');
    Route::post('/game/create', 'Admin\GameController@store')->name('game.store');

});
