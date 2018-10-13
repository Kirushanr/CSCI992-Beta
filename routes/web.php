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
//Route::get('/users/{user}', 'UsersController@show')->name('users.show');

Route::get('/user/selling', 'UserController@selling')->name('user.selling');
Route::get('/user/wish', 'UserController@wish')->name('user.wish');

// post ad
Route::get('/post/ad/{type}', 'AdsController@create')->name('createAd');
Route::post('/post/ad/{type}', 'AdsController@store')->name('publishAd');

// edit(delete and update)
Route::get('/post/ad/{ad}/edit', 'AdsController@edit')->name('editAd');
Route::delete('/post/ad/{ad}', 'AdsController@remove')->name('deleteAd');
Route::patch('/post/ad/{ad}', 'AdsController@update')->name('updateAd');

// advertise detail page
Route::get('/ad/{ad}', 'AdsController@show')->name('showAd');