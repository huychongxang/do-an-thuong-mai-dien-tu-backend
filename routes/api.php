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
});
