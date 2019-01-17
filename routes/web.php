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

Route::get('test-rand-name', function (){
    return RdsName::get_incrementalHash('storage/imagesDefauts/default.jpg');
});
Route::get('test-avatar-path',function(){
    return AvatarDp::get_avatarUserName(\phpDocumentor\Reflection\Types\This::class);// a tester 
});

Route::get('users/{id}/profile_photo','PhotosController@showProfilePhoto')->middleware('auth')->name('showProfilePhoto');

/*Route::middleware('auth')->group(function () {
    Route::name('profile.')->prefix('profile')->group(function () {
        Route::name('index')->get('user', 'UserProfileController@index');
        Route::name('show')->get('user/{id}', 'UserProfileController@show');
        Route::name('update')->post('user', 'UserProfileController@update');
    });
    Route::name('cropper.')->prefix('cropper')->group(function () {
        Route::name('index')->get('cropper', 'CropperController@index');
        Route::name('edit')->get('cropper', 'CropperController@edit');
        Route::name('soumettre')->post('cropper', 'CropperController@soumettre');
    });
    Route::name('users.')->prefix('users')->group(function () {
        Route::name('showProfilePhoto')->get('users/{id}/profile_photo', 'PhotosController@showProfilePhoto');
        Route::name('showAvatarUser')->get('users/{id}/avatar_user', 'PhotosController@showAvatarUser');
    });
});*/
