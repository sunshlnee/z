<?php

Route::get('/', 'PageController')->name('home');

Auth::routes(['reset' => false]);

Route::get('/verify/{token}', 'Auth\RegisterController@verify')->name('register.verify');

Route::get('/password/email', 'Auth\ForgotPasswordController@showForgotForm')->name('password.forgot');
Route::post('/password/send', 'Auth\ForgotPasswordController@sendToEmail')->name('password.send');
Route::get('/password/{token}', 'Auth\ForgotPasswordController@showResetForm')->name('password.reset');
Route::post('/password', 'Auth\ForgotPasswordController@update')->name('password.update');

Route::group([
    'prefix' => 'ajax',
    'as' => 'ajax.',
], function () {
    Route::post('/reload-cart', 'Products\CardController@reloadCart')->name('cart.reload')->middleware('auth');
    Route::post('/cart-count', 'Products\CardController@cartCount')->middleware('auth');
    Route::post('/make-order', 'Products\CardController@makeOrder')->middleware('auth');
    Route::delete('/remove-order/{id}', 'Products\CardController@removeOrder')->middleware('auth');
});

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'namespace' => 'Admin',
    'middleware' => ['can:admin-panel'],
], function () {
    Route::get('/', 'HomeController')->name('home');
    Route::resource('users', 'UsersController');
    Route::resource('brands', 'BrandsController');
    Route::resource('colors', 'ColorsController');
    Route::resource('sizes', 'SizesController');
    Route::resource('fabrics', 'FabricsController');
    Route::resource('categories', 'CategoriesController');

    Route::group(['prefix' => 'products', 'as' => 'products.'], function () {
        Route::get('/', 'ProductsController@index')->name('index');
        Route::post('/', 'ProductsController@store')->name('store');
        Route::get('/create', 'ProductsController@create')->name('create');
        Route::get('/{product}/edit', 'ProductsController@edit')->name('edit');
        Route::put('/{product}/edit', 'ProductsController@update')->name('update');
        Route::get('/{product}/edit/photos', 'ProductsController@photosForm')->name('edit.photos');
        Route::post('/{product}/edit/photos', 'ProductsController@photos');
        Route::delete('/edit/photos/{id}', 'ProductsController@removePhoto')->name('edit.photos.delete');
        Route::get('/{product}/edit/preview', 'ProductsController@photoPreviewForm')->name('edit.preview');
        Route::post('/{product}/edit/preview', 'ProductsController@photoPreview');
        Route::get('/{product}/show', 'ProductsController@show')->name('show');
        Route::post('/show/{product}/recommend', 'ProductsController@recommend')->name('recommend');
        Route::delete('/{product}/destroy', 'ProductsController@destroy')->name('destroy');
    });
});

Route::group([
    'prefix' => 'products',
    'as' => 'products.',
    'namespace' => 'Products',
], function () {
    Route::get('/show/{product}', 'ProductController@show')->name('show');
    Route::post('/show/{product}/cart/{size}', 'CardController@add');
    Route::delete('/show/{product}/cart/{size}', 'CardController@remove');
    Route::get('/{products_path?}', 'ProductController@catalog')->name('catalog')->where('products_path', '.+');
});