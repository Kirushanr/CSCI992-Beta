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




Route::get('/dashboard',function(){
    return view('admin.dashboard');
});

//Route to GET the home/main page of post advert
Route::get('/post/ad','AdvertsController@getAdvertHome')->name('post-ad');

//Route to GET the post advert page based on the type parameter
Route::get('/post/ad/{type}','AdvertsController@getAdvert')->name('post-ad-type.show');

//Route to get review post
Route::get('posts','ReviewPostController@posts')->name('posts');

//Route to post review post
Route::post('posts', 'ReviewPostController@postPost')->name('posts.post');

//Route to get post id
Route::get('post/{id}', 'ReviewPostController@show')->name('posts.show');


Route::get('/search',SearchAdvertController::class);
