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
Route::get('/logout', 'Auth\LoginController@getLogout');
Route::post('/forgot-password', ['uses' => 'Auth\ForgotPasswordController@sendMail']);
Route::get('/change-password/{id}', ['as' => 'change-password', 'uses' => 'AuthController@getChangePassword']);
Route::post('/change-password/{id}', ['uses' => 'AuthController@postChangePassword']);
/*
|--------------------------------------------------------------------------
| index
|--------------------------------------------------------------------------
 */
Route::get('/', ['as' => 'home', 'uses' => 'HomeController@home']);
Route::resource('property', 'PostController');

Route::group(['as' => 'ajax.'], function () {
    Route::post('getMap', ['as' => 'getMap', 'uses' => 'AjaxController@getMap']);
});
