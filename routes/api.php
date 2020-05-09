<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group([
    'namespace' => 'Api',
    'as' => 'api.',
], function () {
    Route::get('/home', 'HomeController@index');
    Route::get('/products/by-category-id/{id}', 'ProductController@getProductsByCategoryId')->name('by_category_id');

    // Login and Register
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
    Route::post('login/facebook', 'AuthController@loginFacebook');
    Route::post('login/google', 'AuthController@loginGoogle');
});
