<?php
/**
 * Created by PhpStorm.
 * Users: mithun
 * Date: 11/30/15
 * Time: 10:04 PM
 */

Route::group(['middleware' => ['web','install', 'auth', 'demo']], function(){
    Route::any('users/update_password', 'UsersController@update_password');
    Route::resource('users/active', 'UsersController@active_users');
    Route::resource('users/banned', 'UsersController@banned_users');
    Route::resource('users/change_status', 'UsersController@change_status');
    Route::resource('users', 'UsersController');
});