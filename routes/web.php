<?php



Route::get('/', 'ClientsController@index');
Route::get('/index', [
    'uses' => 'ClientsController@index',
    'as' => 'Clients.index'
]);

Route::get('/addToCart/{id}', [
    'uses' => 'ClientsController@addToCart',
    'as' => 'Clients.addToCart'
    ]);
Route::get('/removeFromCart/{id}', [
    'uses' => 'ClientsController@removeFromCart',
    'as' => 'Clients.removeFromCart'
]);

Route::get('/cart', [
    'uses' => 'ClientsController@cart',
    'as' => 'Clients.cart'
]);
Route::post('/sendOrder', [
    'uses' => 'ClientsController@sendOrder',
    'as' => 'Clients.sendOrder'
]);

Route::get('/login', [
    'uses' => 'ClientsController@login',
    'as' => 'Clients.login'
]);
Route::post('/postLogin', [
    'uses' => 'AdminsController@postLogin',
    'as' => 'Admins.postLogin'
]);

Route::get('/logout', [
    'uses' => 'AdminsController@logout',
    'as' => 'Admins.logout'
]);

Route::get('/products', [
    'uses' => 'AdminsController@products',
    'as' => 'Admins.products'
]);

Route::get('/product/{id}', [
    'uses' => 'AdminsController@product',
    'as' => 'Admins.editInsertProduct'
]);



Route::get('/removeProduct/{id}', [
    'uses' => 'ProductsController@removeProduct',
    'as' => 'Products.removeProduct'
]);

Route::post('/product/{id}',[
    'uses' => 'ProductsController@editInsertProduct',
    'as' => 'Products.editInsertProduct'
]);
