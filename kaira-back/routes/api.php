<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1'], function () {
    Route::get('product', 'ProductController@getProducts');
    Route::get('product/{id}', 'ProductController@getProductVariantByProductId');
    Route::get('product', 'ProductController@getProducts');
    Route::get('products/new', 'ProductController@getRandomProducts');
    Route::get('products/bestsellers', 'ProductController@getRandomLatestProducts');
    Route::get('products/recommended', 'ProductController@getRandomOffsetProducts');
    Route::get('products/expensive', 'ProductController@getRandomSteppedProducts');
    Route::post('order', 'OrderController@createOrder');
});
