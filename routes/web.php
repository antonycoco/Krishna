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

    Route::resource ('avatar','AvatarController');

});
/*Route::middleware ('auth', 'verified')->group (function () {
    Route::resource ('avatar', 'AvatarController', [
        'only' => ['index','show','update','store']
    ]);
});*/


Route::get('profile', 'UserProfileController@index')->middleware('auth')->name('profile.index');
Route::get('profile', 'UserProfileController@show')->middleware('auth')->name('profile.show');
Route::post('profile', 'UserProfileController@update')->middleware('auth')->name('profile.update');

Route::get('cropper', 'CropperController@index')->middleware('auth')->name('cropper.index');
Route::get('cropper', 'CropperController@edit')->middleware('auth')->name('cropper.edit');
Route::post('cropper', 'CropperController@soumettre')->middleware('auth')->name('cropper.soumettre');

Route::get('users/{id}/profile_photo', 'PhotosController@showProfilePhoto')->middleware('auth')->name('users.showProfilePhoto');