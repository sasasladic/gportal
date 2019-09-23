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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('profile', function () {
    // Only verified users may enter...
})->middleware('verified');

Route::prefix('dashboard')->middleware('verified')->group(function () {

    /*
     * Home route
     */
    Route::get('/home', 'HomeController@index')->name('home');


    Route::get('/user/all', 'Admin\UserController@index')->name('user.index');
    Route::get('/user/edit/{id}', 'Admin\UserController@edit')->name('user.edit');
    Route::patch('/user/edit/{id}', 'Admin\UserController@update')->name('user.update');
    Route::get('/user/remove/{id}', 'Admin\UserController@destroy')->name('user.destroy');
    Route::get('/user/create', 'Admin\UserController@create')->name('user.create');
    Route::patch('/user/create', 'Admin\UserController@store')->name('user.store');


});
