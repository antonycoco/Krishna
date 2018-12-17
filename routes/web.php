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

Auth::routes(['verify' => true]);

Route::get('/', 'HomeController@index')->name('home')->middleware('verified');

Route::middleware('admin')->group(function () {

    Route::resource ('transitional', 'TransitionalController');

});
Route::middleware ('auth', 'verified')->group (function () {
    Route::resource ('avatar', 'AvatarController', [
        'only' => ['index','show','update','store']
    ]);
});

Route::get('profile', 'UserProfileController@show')->middleware('auth')->name('profile.show');
Route::post('profile', 'UserProfileController@update')->middleware('auth')->name('profile.update');

Route::get('traitement', 'CropperController@edit')->middleware('auth')->name('traitement.edit');
Route::post('traitement', 'CropperController@validate')->middleware('auth')->name('traitement.validate');
