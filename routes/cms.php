<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 23-Mar-20
 * Time: 2:21 PM
 */

use App\Models\ProductCategory;
use Yajra\DataTables\Facades\DataTables;

Route::group([
    'prefix' => env('ADMIN_PATH'),
    'as' => env('ADMIN_PATH') . '.',
    'namespace' => 'Cms'
], function () {
    Route::get('/', function () {
        return redirect()->route(env('ADMIN_PATH') . '.dashboard');
    });
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login')->name('login.post');
    Route::post('logout', 'LoginController@logout')->name('logout');
});


Route::group([
    'prefix' => env('ADMIN_PATH'),
    'as' => env('ADMIN_PATH') . '.',
    'namespace' => 'Cms',
    'middleware' => ['auth:admin']
], function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');

    Route::resource('product-categories', 'ProductCategoryController');
    Route::resource('product', 'ProductController');
    Route::resource('product', 'ProductController');
    Route::resource('product-attribute-group', 'ProductAttributeGroupController');

    Route::resource('orders', 'OrderController');
    Route::put('orders/update-price/{id}', 'OrderController@updatePrice')->name('orders.update-price');
    Route::post('orders/add-item/{orderId}', 'OrderController@addItem')->name('orders.add-item');
    Route::post('orders/edit-item/{orderId}/{itemId}', 'OrderController@editItem')->name('orders.edit-item');
    Route::post('orders/delete-item/{orderId}', 'OrderController@deleteItem')->name('orders.delete-item');
    Route::post('orders/get-product', 'OrderController@getProductInfo')->name('orders.get-product');

    Route::resource('order-status', 'OrderStatusController');
    Route::resource('payment-status', 'PaymentStatusController');
    Route::resource('shipping-status', 'ShippingStatusController');
});
