<?php

Route::group([
    'namespace' => 'Cms\Api',
    'as' => env('ADMIN_PATH') . '-api.',
    'middleware' => ['auth:admin']
], function () {

});
