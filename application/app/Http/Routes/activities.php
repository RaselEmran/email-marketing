<?php
/**
 * Created by PhpStorm.
 * Users: mithun
 * Date: 11/30/15
 * Time: 10:04 PM
 */
Route::group(['middleware' => ['web','install', 'auth']], function(){
    Route::get('activities/clear', 'ActivityController@clear_activities');
    Route::resource('activities', 'ActivityController');
});