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

use App\User;

Route::get('/', function () {
    if(Auth::user()!= null)
        return redirect()->route('home');
    return view('welcome');
});

Auth::routes();

Route::resource('users', 'UserController');

Route::get('/home', 'HomeController@index')->name('home');

//Friends
Route::get('/users/{id}/friends', 'UserController@list_friends')->name('users.friends');
// Route::get('/users/{id}/friends/search', 'UserController@search_friends')->name('users.search_friends');
Route::get('/users/search/users', 'UserController@search')->name('users.search');

//Friend requests:
Route::post('/users/send/friend_request', 'UserController@friend_request')->name('users.friend_request');
Route::post('/users/accept_friend_request', 'UserController@accept_friend_request')->name('users.accept_friend_request');
Route::post('/users/decline_friend_request', 'UserController@decline_friend_request')->name('users.decline_friend_request');


