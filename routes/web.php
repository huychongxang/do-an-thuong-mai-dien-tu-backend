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

Route::group([
    'namespace' => 'Web'
], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/danh-muc-san-pham', 'ProductCategoryController@index');
});

Route::group([
    'namespace' => 'Web'
], function () {
    Route::post('post-login', 'AuthController@login')->name('login');
    Route::post('post-registration', 'AuthController@register')->name('register');
    Route::get('logout', 'AuthController@logout')->name('logout');

});

