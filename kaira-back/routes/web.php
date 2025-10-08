<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Product
    Route::delete('products/destroy', 'ProductController@massDestroy')->name('products.massDestroy');
    Route::post('products/media', 'ProductController@storeMedia')->name('products.storeMedia');
    Route::post('products/ckmedia', 'ProductController@storeCKEditorImages')->name('products.storeCKEditorImages');
    Route::resource('products', 'ProductController');

    // Order
    Route::resource('orders', 'OrderController', ['except' => ['create', 'store', 'destroy']]);

    // Color
    Route::delete('colors/destroy', 'ColorController@massDestroy')->name('colors.massDestroy');
    Route::resource('colors', 'ColorController');

    // Size
    Route::delete('sizes/destroy', 'SizeController@massDestroy')->name('sizes.massDestroy');
    Route::resource('sizes', 'SizeController');

    // Material
    Route::delete('materials/destroy', 'MaterialController@massDestroy')->name('materials.massDestroy');
    Route::resource('materials', 'MaterialController');

    // Category
    Route::delete('categories/destroy', 'CategoryController@massDestroy')->name('categories.massDestroy');
    Route::resource('categories', 'CategoryController');

    // Product Values
    Route::delete('product-values/destroy', 'ProductValuesController@massDestroy')->name('product-values.massDestroy');
    Route::post('product-values/media', 'ProductValuesController@storeMedia')->name('product-values.storeMedia');
    Route::post('product-values/ckmedia', 'ProductValuesController@storeCKEditorImages')->name('product-values.storeCKEditorImages');
    Route::resource('product-values', 'ProductValuesController');

    // Season
    Route::delete('seasons/destroy', 'SeasonController@massDestroy')->name('seasons.massDestroy');
    Route::resource('seasons', 'SeasonController');

    // Brand
    Route::delete('brands/destroy', 'BrandController@massDestroy')->name('brands.massDestroy');
    Route::resource('brands', 'BrandController');

    // Country
    Route::delete('countries/destroy', 'CountryController@massDestroy')->name('countries.massDestroy');
    Route::resource('countries', 'CountryController');

    // Order Item
    Route::resource('order-items', 'OrderItemController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
