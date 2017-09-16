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

Route::post('/login', 'Auth\LoginController@postLogin');
Route::get('/logout', 'Auth\LoginController@logout');
Route::post('/forgot-password', 'Auth\ForgotPasswordController@sendMail');
Route::get('/change-password/{id}', 'Auth\ResetPasswordController@getPassword');
Route::post('/change-password/{id}', 'Auth\ResetPasswordController@change');
Route::get('auth/{provider}', 'Auth\RegisterController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\RegisterController@handleProviderCallback');
/*
|--------------------------------------------------------------------------
| index
|--------------------------------------------------------------------------
 */
Route::get('/', ['as' => 'home', 'uses' => 'HomeController@home']);
Route::get('/type/{slug}', ['as' => 'show', 'uses' => 'TypeController@show']);
Route::get('/township/{slug}', ['as' => 'township', 'uses' => 'PostController@townShip']);
Route::get('/advanced-search', ['as' => 'search', 'uses' => 'PostController@search']);
Route::resource('property', 'PostController');

Route::group(['as' => 'ajax.'], function () {
    Route::post('getMap', ['as' => 'getMap', 'uses' => 'AjaxController@getMap']);
    Route::post('uploadImage', ['as' => 'uploadImage', 'uses' => 'AjaxController@uploadFileUploader']);
    Route::post('removeImage', ['as' => 'removeImage', 'uses' => 'AjaxController@removeFileUploader']);
});
/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
 */
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'as' => 'admin.'], function () {
    require __DIR__ . '/admin.php';
});
