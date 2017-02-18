<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
*/

/*---------------------------- User ----------------------------*/
Route::post('/system/1/user/insert', array('before' => '', 'uses' => 'UserController@Insert'));
Route::post('/system/1/user/delete', array('before' => '', 'uses' => 'UserController@Delete'));
Route::post('/system/1/user/changestate', array('before' => '', 'uses' => 'UserController@ChangeState'));
Route::post('/system/user/login', array('before' => '', 'uses' => 'UserController@LogIn'));
Route::get('/system/1/user/logout', array('before' => '', 'uses' => 'UserController@LogOut'));

/*############################ Misc ############################*/
/*---------------------------- Brand ----------------------------*/
Route::post('/system/brand/insert', array('before' => '', 'uses' => 'MiscController@BrandInsert'));
Route::post('/system/brand/delete', array('before' => '', 'uses' => 'MiscController@BrandDelete'));
Route::get('/system/brand/getall', array('before' => '', 'uses' => 'MiscController@BrandGetAll'));