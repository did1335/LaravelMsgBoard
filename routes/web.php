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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => ['auth']], function () {
    Route::get('/', 'BlogController@index');

    Route::group(['prefix' => 'message'], function () {
        Route::get('create', 'BlogController@create')->name('form.create');
        Route::post('/', 'BlogController@store');
        Route::get('{id}', 'BlogController@show');
        Route::get('{id}/edit', 'BlogController@edit');
        Route::put('{id}', 'BlogController@update');
        Route::delete('{id}', 'BlogController@destroy');
    });

});
