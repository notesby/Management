<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
*/

/*---------------------------- User ----------------------------*/
Route::post('/user/insert', array('before' => '', 'uses' => 'UserController@Insert'));
Route::post('/user/login', array('before' => '', 'uses' => 'UserController@LogIn'));
Route::get('/user/logout', array('before' => '', 'uses' => 'UserController@LogOut'));

/*---------------------------- Dashboard ----------------------------*/
Route::get('/test', array('before' => '', 'uses' => 'DashboardController@GetAsanaTasks'));

/*############################ Misc ############################*/
Route::get('/', array('before' => '', 'uses' => 'DashboardController@GetView'));