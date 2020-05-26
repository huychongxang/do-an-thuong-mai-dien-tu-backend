<?php
Route::group([
    'namespace' => 'Web\Api',
    'as' => 'api-web.'
], function () {
    Route::post('/add-to-cart', 'CartController@add')->name('add-cart');
    Route::post('/remove-item', 'CartController@remove')->name('remove-item');

    Route::get('products', 'ProductController@index');
    Route::get('product-categories', 'ProductCategoryController@index');
});
