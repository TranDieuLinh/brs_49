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
Route::get('admin/', 'HomeController@admin');
Route::get('review', ['uses' => 'BookController@review', 'as' => 'review']);
Route::resource('book', 'BookController');
Auth::routes();

Route::get('/auth', 'AuthController@index');
