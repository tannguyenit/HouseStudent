<?php
/*
|--------------------------------------------------------------------------
| Env
|--------------------------------------------------------------------------
 */
Route::get('/get-env', ['as' => 'getEnv', 'uses' => 'DashboardController@getEnv']);
Route::post('/get-env', ['as' => 'saveEnv', 'uses' => 'DashboardController@saveEnv']);
/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
 */
Route::get('/', ['as' => 'dashboard', 'uses' => 'DashboardController@dashboard']);
Route::get('/setting', ['as' => 'setting', 'uses' => 'SettingController@index']);
Route::post('/setting/save', ['as' => 'setting.save', 'uses' => 'SettingController@save']);
Route::post('/setting/{id}', ['as' => 'setting.update', 'uses' => 'SettingController@update']);
Route::get('/type', ['as' => 'type', 'uses' => 'CategoryController@index']);
Route::post('/type', ['as' => 'store', 'uses' => 'CategoryController@store']);
Route::get('/status', ['as' => 'status', 'uses' => 'StatusController@index']);
Route::post('/status', ['as' => 'storeStatus', 'uses' => 'StatusController@store']);
Route::get('/post', ['as' => 'indexPost', 'uses' => 'PostController@index']);
Route::get('/post/edit/{id}', ['as' => 'showPost', 'uses' => 'PostController@show']);
Route::post('/post/edit/{id}', ['as' => 'updatePost', 'uses' => 'PostController@update']);
Route::get('/post/advanced-search', ['as' => 'search', 'uses' => 'PostController@search']);
Route::resource('/user', 'UserController');
/*
|--------------------------------------------------------------------------
| Ajax
|--------------------------------------------------------------------------
 */
Route::group(['as' => 'ajax.'], function () {
    Route::post('updateType', ['as' => 'updatetype', 'uses' => 'AjaxController@updateType']);
    Route::post('deleteType', ['as' => 'deleteType', 'uses' => 'AjaxController@deleteType']);
    Route::post('updateStatus', ['as' => 'updateStatus', 'uses' => 'AjaxController@updateStatus']);
    Route::post('deleteStatus', ['as' => 'deleteStatus', 'uses' => 'AjaxController@deleteStatus']);
    Route::post('change-status-post', ['as' => 'change-status-post', 'uses' => 'AjaxController@changeStatusPost']);
    Route::post('change-status-pin', ['as' => 'change-status-pin', 'uses' => 'AjaxController@changeStatusPin']);
    Route::post('deletePost', ['as' => 'deletePost', 'uses' => 'AjaxController@deletePost']);
    Route::post('updateUser', ['as' => 'updateUser', 'uses' => 'AjaxController@updateUser']);
    Route::post('deleteUser', ['as' => 'deleteUser', 'uses' => 'AjaxController@deleteUser']);
    Route::post('changeActiveUser', ['as' => 'changeActiveUser', 'uses' => 'AjaxController@changeActiveUser']);
});
