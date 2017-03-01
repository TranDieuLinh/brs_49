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
Route::get('book/search', [
    'as' => 'user.book.search',
    'uses' => 'BookController@search'
]);
Route::resource('home', 'HomeController');
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('/', 'HomeController@admin');
});

Route::get('review', ['uses' => 'BookController@review', 'as' => 'review']);
Route::post('book/vote', 'BookController@vote');
Route::post('book/deleteComment', 'BookController@deleteComment');
Route::post('book/deleteReview', 'BookController@deleteReview');
Route::post('book/comment', 'BookController@comment');
Route::post('book/review', 'BookController@review');
Route::post('book/editReview', 'BookController@editReview');
Route::post('book/editComment', 'BookController@editComment');
Route::resource('book', 'BookController');

Route::get('/auth', 'AuthController@index');
Route::get('/allrequest', 'UserController@allRequest');
Route::get('/addRequest', 'UserController@addRequest');
Route::post('/addRequest', 'UserController@sendRequest');
Route::resource('user', 'UserController');

Route::post('book/deleteRequest', 'RequestController@deleteRequest');
Route::resource('request', 'RequestController');
Auth::routes();

