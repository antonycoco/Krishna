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
Auth::routes();

Route::get('/','FrontController@home');

Route::middleware('admin')->group(function () {
    Route::resource('validation','ValidateController');
});

Route::resource('avatar','AvatarController');

Route::get('avatarStream','ProfileController@avatarStream')->name('avatarStream');
Route::get('avatarsStreamSubmit','ProfileController@avatarsStreamSubmit')->name('avatarsStreamSubmit');

Route::get('profile','ProfileController@show')->name('profile.show');

Route::get('test','testController@test')->name('test');
