<?php

# Static Pages. Redirecting admin so admin cannot access these pages.
Route::group(['middleware' => ['redirectAdmin']], function() {
    Route::get('/', ['as' => 'home', 'uses' => 'PagesController@getHome']);
    Route::get('about', ['as' => 'about', 'uses' => 'PagesController@getAbout']);
    Route::get('contact', ['as' => 'contact', 'uses' => 'PagesController@getContact']);
    Route::get('customer', ['as' => 'customer', 'uses' => 'PagesController@getCustomer']);
    Route::get('infoproyecto', ['as' => 'infoproyecto', 'uses' => 'PagesController@getInfoProyecto']); 
   
    Route::group(['prefix' => 'products', 'as' => 'products'], function() {
        Route::get('kerux', ['as' => 'kerux', 'uses' => 'PagesController@getKeruxInfo']);
        Route::get('komat', ['as' => 'komat', 'uses' => 'PagesController@getKomatInfo']);
        Route::get('/', 'PagesController@getProducts');
    });
});

# Registration
Route::group(['middleware' => 'guest'], function() {
    Route::get('register', 'RegistrationController@create');
    Route::post('register', ['as' => 'registration.store', 'uses' => 'RegistrationController@store']);
});

# Authentication
Route::get('login', ['as' => 'login', 'middleware' => 'guest', 'uses' => 'SessionsController@create']);
Route::get('logout', ['as' => 'logout', 'uses' => 'SessionsController@destroy']);
Route::resource('sessions', 'SessionsController', ['only' => ['create', 'store', 'destroy']]);

# Forgotten Password
Route::group(['middleware' => 'guest'], function() {
    Route::get('forgot_password', 'Auth\PasswordController@getEmail');
    Route::post('forgot_password', 'Auth\PasswordController@postEmail');
    Route::get('reset_password/{token}', 'Auth\PasswordController@getReset');
    Route::post('reset_password/{token}', 'Auth\PasswordController@postReset');
});

# Standard User Routes
Route::group(['middleware' => ['auth', 'standardUser']], function() {
    Route::get('userProtected', 'StandardUser\StandardUserController@getUserProtected');
    Route::resource('profiles', 'StandardUser\UsersController', ['only' => ['show', 'edit', 'update']]);
});

# Admin Routes
Route::group(['middleware' => ['auth', 'admin']], function() {
    Route::get('admin', ['as' => 'admin_dashboard', 'uses' => 'Admin\AdminController@getHome']);
    Route::resource('admin/profiles', 'Admin\AdminUsersController', ['only' => ['index', 'show', 'edit', 'update', 'destroy']]);
});

Route::group(['prefix' => 'admin', 'as' => 'admin'], function() {
    Route::controller('contenidos', 'ContenidosController');
    Route::get('/', 'AdminController@getIndex');
});

# Contenido routes
Route::get('contenidos', ['as' => 'contenidos', 'uses' => 'ContenidosController@create']);
Route::post('contenidos', ['as' => 'contenidos', 'uses' => 'ContenidosController@store']);

# Contacto routes
Route::get('contact', ['as' => 'contact', 'uses' => 'ContactoController@index']);
Route::post('contact', ['as' => 'contact', 'uses' => 'ContactoController@store']);
