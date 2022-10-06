<?php

use Illuminate\Support\Facades\Route;

Route::middleware('admin')->group(function () {
    Route::get('/admin', 'App\Http\Controllers\Admin\AdminProductController@index')->name('admin.home.index');
    // Products
    Route::get('/admin/products', 'App\Http\Controllers\Admin\AdminProductController@index')->name('admin.product.index');
    Route::post('/admin/products/store', 'App\Http\Controllers\Admin\AdminProductController@store')->name('admin.product.store');
    Route::get('/admin/products/{id}/edit', 'App\Http\Controllers\Admin\AdminProductController@edit')->name('admin.product.edit');
    Route::put('/admin/products/{id}/update', 'App\Http\Controllers\Admin\AdminProductController@update')->name('admin.product.update');
    Route::delete('/admin/products/{id}/delete', 'App\Http\Controllers\Admin\AdminProductController@delete')->name('admin.product.delete');
    // Address
    Route::get('/admin/address', 'App\Http\Controllers\Admin\AdminAddressController@index')->name('admin.address.index');
    Route::post('/admin/address/store', 'App\Http\Controllers\Admin\AdminAddressController@store')->name('admin.address.store');
    Route::get('/admin/address/{id}/edit', 'App\Http\Controllers\Admin\AdminAddressController@edit')->name('admin.address.edit');
    Route::put('/admin/address/{id}/update', 'App\Http\Controllers\Admin\AdminAddressController@update')->name('admin.address.update');
    Route::delete('/admin/address/{id}/delete', 'App\Http\Controllers\Admin\AdminAddressController@delete')->name('admin.address.delete');
    // Orders
    Route::get('/admin/order', 'App\Http\Controllers\Admin\AdminOrdersController@index')->name('admin.order.index');
    Route::post('/admin/order/store', 'App\Http\Controllers\Admin\AdminOrdersController@store')->name('admin.order.store');
    Route::get('/admin/order/{id}/edit', 'App\Http\Controllers\Admin\AdminOrdersController@edit')->name('admin.order.edit');
    Route::put('/admin/order/{id}/update', 'App\Http\Controllers\Admin\AdminOrdersController@update')->name('admin.order.update');
    Route::delete('/admin/order/{id}/delete', 'App\Http\Controllers\Admin\AdminOrdersController@delete')->name('admin.order.delete');
    // Users
    Route::get('/admin/user', 'App\Http\Controllers\Admin\AdminUsersController@index')->name('admin.user.index');
    Route::post('/admin/user/store', 'App\Http\Controllers\Admin\AdminUsersController@store')->name('admin.user.store');
    Route::get('/admin/user/{id}/edit', 'App\Http\Controllers\Admin\AdminUsersController@edit')->name('admin.user.edit');
    Route::put('/admin/user/{id}/update', 'App\Http\Controllers\Admin\AdminUsersController@update')->name('admin.user.update');
    Route::delete('/admin/user/{id}/delete', 'App\Http\Controllers\Admin\AdminUsersController@delete')->name('admin.user.delete');
    // Items
    Route::get('/admin/items', 'App\Http\Controllers\Admin\AdminItemsController@index')->name('admin.item.index');
    Route::post('/admin/items/store', 'App\Http\Controllers\Admin\AdminItemsController@store')->name('admin.item.store');
    // Route::get('/admin/items/{id}/edit', 'App\Http\Controllers\Admin\AdminItemsController@edit')->name("admin.item.edit");
    Route::put('/admin/items/{id}/update', 'App\Http\Controllers\Admin\AdminItemsController@update')->name('admin.item.update');
    Route::delete('/admin/items/{id}/delete', 'App\Http\Controllers\Admin\AdminItemsController@delete')->name('admin.item.delete');
    // Menus
    Route::get('/admin/menu', 'App\Http\Controllers\Admin\AdminMenusController@index')->name('admin.menus.index');
    // trademarks
    Route::post('/admin/menut/store', 'App\Http\Controllers\Admin\AdminMenusController@storet')->name('admin.menus.storet');
    Route::get('/admin/menut/{id}/edit', 'App\Http\Controllers\Admin\AdminMenusController@editt')->name('admin.menus.editt');
    Route::put('/admin/menut/{id}/update', 'App\Http\Controllers\Admin\AdminMenusController@updatet')->name('admin.menus.updatet');
    Route::delete('/admin/menut/{id}/delete', 'App\Http\Controllers\Admin\AdminMenusController@deletet')->name('admin.menus.deletet');
    // categories
    Route::post('/admin/menuc/store', 'App\Http\Controllers\Admin\AdminMenusController@storec')->name('admin.menus.storec');
    Route::get('/admin/menuc/{id}/edit', 'App\Http\Controllers\Admin\AdminMenusController@editc')->name('admin.menus.editc');
    Route::put('/admin/menuc/{id}/update', 'App\Http\Controllers\Admin\AdminMenusController@updatec')->name('admin.menus.updatec');
    Route::delete('/admin/menuc/{id}/delete', 'App\Http\Controllers\Admin\AdminMenusController@deletec')->name('admin.menus.deletec');
    // subcategories
    Route::post('/admin/menus/store', 'App\Http\Controllers\Admin\AdminMenusController@stores')->name('admin.menus.stores');
    Route::get('/admin/menus/{id}/edit', 'App\Http\Controllers\Admin\AdminMenusController@edits')->name('admin.menus.edits');
    Route::put('/admin/menus/{id}/update', 'App\Http\Controllers\Admin\AdminMenusController@updates')->name('admin.menus.updates');
    Route::delete('/admin/menus/{id}/delete', 'App\Http\Controllers\Admin\AdminMenusController@deletes')->name('admin.menus.deletes');
});
