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
    if(Auth::user()!= null)
        return redirect()->route('home');
    return view('welcome');
});

Auth::routes();

Route::resource('breweries', 'BreweryController',  ['except' => ['update']]);
Route::post('/breweries/{id}/', 'BreweryController@update')->name('breweries.update');

Route::resource('users', 'UserController',  ['except' => ['update']]);
Route::post('/users/{id}/', 'UserController@update')->name('users.update');

Route::post('/users/{id}/update-password', 'UserController@updatePassword')->name('users.update.pass');
Route::get('/home', 'HomeController@index')->name('home');


Route::get('/{folder?}/{filename?}', ['as' => 'file', 'uses' => function($folder, $filename) {
    return response()->file( storage_path() . '/app/' . $folder. '/' . $filename);  
}]);