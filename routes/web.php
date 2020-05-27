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
    'namespace' => 'Web',
], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/danh-muc-san-pham', 'ProductCategoryController@index')->name('page.list-product-category');
    Route::get('/tin-tuc', 'PostController@index')->name('page.posts');
    Route::get('/tin-tuc/{slug}', 'PostController@show')->name('page.post');
    Route::get('/san-pham', 'ProductController@index')->name('page.products');
    Route::get('/san-pham/{sku}', 'ProductController@show')->name('page.product');
    Route::post('/san-pham/add', 'ProductController@addToCart')->name('page.product.add');

    Route::get('/gio-hang', 'ShoppingCartController@index')->name('page.cart');
    Route::get('/thanh-toan', 'CheckoutController@index')->name('page.checkout')->middleware('auth');
    Route::post('/tao-don-hang', 'CheckoutController@store')->name('page.checkout.store')->middleware(['auth', 'cart_not_null']);
    Route::get('/thanh-cong', 'CheckoutController@hienTrangThanhCong')->name('page.success')->middleware('signed');

    //My Account
    Route::group([
        'middleware' => ['auth'],
        'namespace' => 'MyAccount'
    ], function () {
        Route::get('/tai-khoan', 'MyAccountController@index')->name('page.my-account');
        Route::get('/thong-tin-tai-khoan', 'AccountInfoController@edit')->name('page.account-info.edit');
    });

});

Route::group([
    'namespace' => 'Web',
], function () {
    Route::post('post-login', 'AuthController@login')->name('login');
    Route::post('post-registration', 'AuthController@register')->name('register');
    Route::get('logout', 'AuthController@logout')->name('logout');

    Route::get('/auth/redirect/{provider}', 'AuthController@redirect')->name('login_third');
    Route::get('/callback/{provider}', 'AuthController@callback');
});

