<?php

Route::get('/', ['as' => 'dashboard', 'uses' => 'DashboardController@dashboard']);
Route::get('/setting', ['as' => 'setting', 'uses' => 'SettingController@index']);
Route::post('/setting/{id}', ['as' => 'setting.update', 'uses' => 'SettingController@update']);
