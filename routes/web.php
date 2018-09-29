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

Route::get('/search', function(){
    return view('search.search');
})->name('search');

Route::get('/dashboard',function(){
    return view('admin.dashboard');
});