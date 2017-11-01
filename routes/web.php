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
Route::match(['get', 'post'], '/botman', 'ChatBotFacebookController@handle');
Route::get('/about', ['as' => 'about', 'uses' => 'PageController@about']);
Route::get('/faq', ['as' => 'faq', 'uses' => 'PageController@faq']);
Route::get('/contact', ['as' => 'contact', 'uses' => 'PageController@contact']);
Route::post('/contact', ['as' => 'sendContact', 'uses' => 'PageController@sendContact']);
Route::get('/regulations', ['as' => 'regulations', 'uses' => 'PageController@rule']);
Route::group(['middleware' => 'viewpost'], function () {
    Route::resource('property', 'PostController');
});
/* ------------------------------------------------------------------------ */
/*  Auth
/* ------------------------------------------------------------------------ */
Route::group(['middleware' => 'auth'], function () {
    Route::get('/author/{slug}', ['as' => 'profile', 'uses' => 'UserController@index']);
    Route::put('/author/update/{id}', ['as' => 'updateUser', 'uses' => 'UserController@update']);
    Route::get('/my-properties', ['as' => 'myProperties', 'uses' => 'PostController@myProperties']);
});
Route::get('/active', 'UserController@activeUser');
Route::get('/member/{slug}', ['as' => 'member', 'uses' => 'UserController@member']);
/* ------------------------------------------------------------------------ */
/*  Ajax
/* ------------------------------------------------------------------------ */
Route::group(['as' => 'ajax.'], function () {
    Route::post('getMap', ['as' => 'getMap', 'uses' => 'AjaxController@getMap']);
    Route::post('like', ['as' => 'like', 'uses' => 'AjaxController@like']);
    Route::post('getSingleProperty', ['as' => 'getSingleProperty', 'uses' => 'AjaxController@getSingleProperty']);
    Route::post('uploadImage', ['as' => 'uploadImage', 'uses' => 'AjaxController@uploadFileUploader']);
    Route::post('removeImage', ['as' => 'removeImage', 'uses' => 'AjaxController@removeFileUploader']);
    Route::post('deletePost', ['as' => 'deletePost', 'uses' => 'AjaxController@deletePost']);
    Route::post('checkEmail', ['as' => 'checkEmail', 'uses' => 'UserController@checkEmail']);
    Route::post('checkusername', ['as' => 'checkusername', 'uses' => 'UserController@checkusername']);
});
/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
 */
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    require __DIR__ . '/admin.php';
});
