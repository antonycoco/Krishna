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
//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/','FrontController@home');//->name('home')->middleware('verified');

Route::middleware('admin')->group(function ()
{
});
Route::resource('validation','ValidateController');
//Route::get('validation','ValidateController@index')->name('validation.index');
//creation de la route pour la connexion ldapp
//Route::get('login','LoginController@getForm')->name('login');
//Route::post('login','LoginController@postForm')->name('login');


Route::resource('avatar','AvatarController');

Route::get('avatarStream','ProfileController@avatarStream')->name('avatarStream');
Route::get('avatarsStreamSubmit','ProfileController@avatarsStreamSubmit')->name('avatarsStreamSubmit');

Route::get('profile','ProfileController@show')->name('profile.show');

Route::get('test','ProfileController@test')->name('test');
