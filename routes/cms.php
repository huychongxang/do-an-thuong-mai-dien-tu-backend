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
    'prefix' => 'cms',
    'as' => 'cms.',
    'namespace' => 'Cms'
], function () {
    Route::get('/', function () {
        return redirect()->route('cms.dashboard');
    });
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login')->name('login.post');
    Route::post('logout', 'LoginController@logout')->name('logout');
});


Route::group([
    'prefix' => 'cms',
    'as' => 'cms.',
    'namespace' => 'Cms',
    'middleware' => ['auth:admin']
], function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');

    Route::resource('product-categories','ProductCategoryController');
});

Route::get('/datatables',function(){
    return Datatables::collection(ProductCategory::all())->make(true)->name('datatables');
});
