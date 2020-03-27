<?php

Route::group([
    'namespace' => 'Cms\Api',
    'as' => env('ADMIN_PATH') . '-api.',
    'middleware' => ['auth:admin']
], function () {
    Route::get('get', 'ProductCategoryController@list')->name('product-category.list');
});
