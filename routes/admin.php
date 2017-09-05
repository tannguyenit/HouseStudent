<?php

Route::get('/', ['as' => 'dashboard', 'uses' => 'DashboardController@dashboard']);
Route::get('/setting', ['as' => 'setting', 'uses' => 'SettingController@index']);
Route::get('/type', ['as' => 'type', 'uses' => 'TypeController@index']);
Route::post('/type', ['as' => 'store', 'uses' => 'TypeController@store']);
Route::post('/setting/{id}', ['as' => 'setting.update', 'uses' => 'SettingController@update']);
/*
|--------------------------------------------------------------------------
| Ajax
|--------------------------------------------------------------------------
 */
Route::group(['as' => 'ajax.'], function () {
    Route::post('updateType', ['as' => 'updatetype', 'uses' => 'AjaxController@updateType']);
    Route::post('deleteType', ['as' => 'deleteType', 'uses' => 'AjaxController@deleteType']);
});
