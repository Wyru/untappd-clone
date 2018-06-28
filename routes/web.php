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
        return redirect()->route('feed', Auth::user()->id);
    return view('welcome');
});

Auth::routes();
//Friends
Route::get('/users/{id}/friends', 'UserController@list_friends')->name('users.friends');
Route::post('/users/accept_friend_request', 'UserController@accept_friend_request')->name('users.accept_friend_request');
Route::post('/users/send/friend_request', 'UserController@friend_request')->name('users.friend_request');
Route::post('/users/decline_friend_request', 'UserController@decline_friend_request')->name('users.decline_friend_request');
// Route::get('/users/{id}/friends/search', 'UserController@search_friends')->name('users.search_friends');
Route::get('/users/search/users', 'UserController@search')->name('users.search');

Route::resource('breweries', 'BreweryController',  ['except' => ['update']]);
Route::post('/breweries/{id}/', 'BreweryController@update')->name('breweries.update');

Route::resource('users', 'UserController',  ['except' => ['update']]);
Route::post('/users/{id}/', 'UserController@update')->name('users.update');

Route::post('/users/{id}/update-password', 'UserController@updatePassword')->name('users.update.pass');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/feed/{id}', 'CheckInController@showAllHome')->name('feed');

//Check in
Route::get('/check_in/create', 'CheckInController@create')->name('check_in.create');
Route::post('/check_in/store', 'CheckInController@store')->name('check_in.store');
Route::get('/check_in/show/{id}', 'CheckInController@show')->name('check_in.show');



//Friend requests:

Route::get('/{folder?}/{filename?}', ['as' => 'file', 'uses' => function($folder, $filename) {
    return response()->file( storage_path() . '/app/' . $folder. '/' . $filename);  
}]);
