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


Route::get('user/dashboard','UserAccountController@index')->name('user-dashboard');    

Route::get('user/dashboard/notification','UserAccountController@notifications')->name('notification.show');
Route::post('user/dashboard/notification','UserAccountController@setNotifications')->name('notification.update');
Route::get('user/dashboard/wishlist','UserAccountController@getWishList')->name('user-wishlist');
Route::get('user/dashboard/messages','MessagesController@getThreads')->name('user-messages');
Route::get('user/dashboard/messages/{id}','MessagesController@show')->name('user-messages.show');
Route::put('user/dashboard/messages/{id}', 'MessagesController@update')->name('user-message.update');


//Route to GET the home/main page of post advert
Route::get('/post/ad','AdvertsController@index')->name('post-ad');

//Route to GET the post advert page based on the type parameter
Route::get('/post/ad/{type}','AdvertsController@getAdvert')->name('post-ad-type.show');

Route::get('/search',SearchAdvertController::class)->name('search');

Route::post('/post/ad','AdvertsController@postAdvert')->name('store-ad');

Route::get('/advert/{id}','AdvertsController@viewAdvert')->name('view-advert');

Route::post('/wishlist','AddToWishList@post')->name('wishlist.post');

Route::get('edit/ad/{id}','AdvertsController@editAdvert')->name('edit.show');
Route::post('edit/ad/{id}','AdvertsController@updateAdvert')->name('update.ad');
#Route::get('/messages/{id}','MessagesController@index')->name('message-landing');
Route::get('/message/seller/{id}','MessagesController@create')->name('message-create');
Route::post('/message/seller/{id}','MessagesController@store')->name('message-store');


Route::get('/review/{id}','ReviewController@index')->name('reviews.show');
Route::get('/review/user/{id}','ReviewController@post')->name('review.post');
Route::post('/review/user/{id}','ReviewController@store')->name('review.store');




Route::get('/admin/dashboard', 'AdminController@getReportedAdverts')    
    ->middleware('is_admin')    
    ->name('admin');
Route::get('/admin/dashboard/reported', 'AdminController@getReportedAdverts')->middleware('is_admin')  ->name('reported.adverts');
Route::post('ban','AdminController@banAdvert')->middleware('is_admin')  ->name('ban.report');
Route::get('/admin/dashboard/banned', 'AdminController@getBannedAdverts')->middleware('is_admin') ->name('banned.adverts');


Route::get('/report/{id}','ReportController@index')->name('report.show');
Route::post('/report/{id}','ReportController@store')->name('report.store');

Route::post('/holdadvert','AdvertsController@holdAdvert');
