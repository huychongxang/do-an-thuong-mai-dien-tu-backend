<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 23-Mar-20
 * Time: 2:21 PM
 */
Route::group([
    'prefix' => 'cms',
    'as' => 'cms.',
    'middleware' => ['auth']
], function () {
    Route::get('/', function () {
        return redirect()->route('cms.dashboard');
    });
    Route::get('dashboard', 'Admin\DashboardController@index')->name('dashboard');
});
