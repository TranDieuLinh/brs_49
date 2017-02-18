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
Route::get('books/search', [
    'as' => 'user.books.search',
    'uses' => 'BooksController@search'
]);
Route::resource('home', 'HomeController');
Route::get('login', 'Auth\LoginController@getLogin');
Route::get('admin/', 'HomeController@admin');
Route::get('user/{id}', 'UserController@show');
Route::post('signup', 'Auth\LoginController@signup');
Route::post('checkemail', 'Auth\LoginController@checkemail');
Route::post('submit_login', 'Auth\LoginController@submit_login');
Route::resource('book', 'BookController');
