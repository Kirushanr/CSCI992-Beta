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

Route::get('login', 'UserController@show');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/post/ad', function () {
    return view('adverts.home');
})->name('post-ad');

// users personal page
Route::get('/users/{user}', 'UsersController@show')->name('users.show');

// post and get
Route::get('/post/ad/{type}', 'AdsController@create')->name('createAd');
Route::post('/post/ad/{type}', 'AdsController@store')->name('publishAd');


Route::post('/post/ad/{ad}/edit', 'AdsController@edit')->name('editAd');
