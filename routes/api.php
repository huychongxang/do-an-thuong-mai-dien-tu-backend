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

    // Login and Register
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
    Route::post('login/facebook', 'AuthController@loginFacebook');
    Route::post('login/google', 'AuthController@loginGoogle');

    // Product
    Route::get('products/{id}', 'ProductController@getById');
    Route::get('/products/by-category-id/{id}', 'ProductController@getProductsByCategoryId')->name('by_category_id');

    // Category
    Route::get('categories', 'CategoryController@index');

    //Post
    Route::get('/posts/by-category-id/{id}', 'PostController@getPostsByCategoryId')->name('posts_by_category_id');
    Route::get('posts/{id}', 'PostController@show')->name('post_detail');

    //Profile
    Route::group([
        'prefix' => 'profile',
        'middleware' => ['auth:api']
    ], function () {
        Route::get('/', 'ProfileController@index');
        Route::post('/update', 'ProfileController@update');
    });

    //Cart
    Route::group([
        'prefix' => 'cart',
        'middleware' => ['auth:api']
    ], function () {
        Route::get('/', 'CartController@index');
        Route::post('/update', 'CartController@update');
    });


});
