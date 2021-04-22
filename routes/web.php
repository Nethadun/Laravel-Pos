<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('admin/create_customers', function(){
    return view('admin/create_customer');
});

Route::get('admin/create_items', function(){
    return view('admin/create_item');
});

Route::get('admin/create_orders', function(){
    return view('admin/create_order');
});

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => ['web', 'auth', 'activity', 'role:admin|user']], function () {
    Route::get('/dashboard', 'Admin\DashboardController@index')->name('dashboard');
    Route::get('/view_customer', 'Admin\CustomerController@customer_home')->name('view_customer');
    Route::POST('/create_customer', 'Admin\CustomerController@customer_add');
    Route::get('/read_customer/{id}', 'Admin\CustomerController@customer_read');
    Route::get('/edit_customer/{id}', 'Admin\CustomerController@customer_edit');
    Route::get('/update_customer/{id}', 'Admin\CustomerController@customer_update');
    Route::get('/delete_customer/{id}', 'Admin\CustomerController@customer_delete');

    Route::get('/view_item', 'Admin\ItemController@item_home')->name('view_item');
    Route::POST('/create_item', 'Admin\ItemController@item_add');
    Route::get('/read_item/{id}', 'Admin\ItemController@item_read');
    Route::get('/update_item/{id}', 'Admin\ItemController@item_update');
    Route::get('/delete_item/{id}', 'Admin\ItemController@item_delete');

    Route::get('/edit_item/{id}', 'Admin\ItemController@item_edit');

    Route::get('/create_orders', 'Admin\OrderController@customer_homes');
    Route::get('/get_item/{id}', 'Admin\OrderController@item_read');

    Route::get('/plugin', function () {
        return view('admin.plugin');
    });
});
