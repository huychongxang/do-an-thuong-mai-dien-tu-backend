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
    Route::get('/danh-muc-san-pham', 'ProductCategoryController@index')->name('page.list-product-category');
    Route::get('/tin-tuc', 'PostController@index')->name('page.posts');
    Route::get('/san-pham', 'ProductController@index')->name('page.products');
});

Route::group([
    'namespace' => 'Web'
], function () {
    Route::post('post-login', 'AuthController@login')->name('login');
    Route::post('post-registration', 'AuthController@register')->name('register');
    Route::get('logout', 'AuthController@logout')->name('logout');

    Route::get('/auth/redirect/{provider}', 'AuthController@redirect')->name('login_third');
    Route::get('/callback/{provider}', 'AuthController@callback');
});

