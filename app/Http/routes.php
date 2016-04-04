<?php

# Static Pages. Redirecting admin so admin cannot access these pages.
Route::group(['middleware' => ['redirectAdmin']], function() {
    Route::get('/', ['as' => 'home', 'uses' => 'PagesController@getHome']);
    Route::get('soporte', ['as' => 'soporte', 'uses' => 'PagesController@getSupport']);
    Route::get('contacto', ['as' => 'contacto', 'uses' => 'ContactoController@index']);
    Route::post('contacto', ['as' => 'contacto', 'uses' => 'ContactoController@store']);
    Route::get('clientes', ['as' => 'clientes', 'uses' => 'PagesController@getCustomer']);
    Route::get('nosotros', ['as' => 'nosotros', 'uses' => 'PagesController@getAbout']);
    Route::get('infoproyecto/{id}', ['as' => 'infoproyecto', 'uses' => 'PagesController@getInfoProyecto']);
    Route::get('contenido/{url}', ['as' => 'contenido', 'uses' => 'PagesController@getShow']);

    Route::group(['prefix' => 'productos', 'as' => 'products'], function() {
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
//Route::group(['middleware' => 'guest'], function() {
//    Route::get('forgot_password', 'Auth\PasswordController@getEmail');
//    Route::post('forgot_password', 'Auth\PasswordController@postEmail');
//    Route::get('reset_password/{token}', 'Auth\PasswordController@getReset');
//    Route::post('reset_password/{token}', 'Auth\PasswordController@postReset');
//});
# Standard User Routes
//Route::group(['middleware' => ['auth', 'standardUser']], function() {
//    Route::get('userProtected', 'StandardUser\StandardUserController@getUserProtected');
//    Route::resource('profiles', 'StandardUser\UsersController', ['only' => ['show', 'edit', 'update']]);
//});
# Admin Routes
//Route::group(['middleware' => ['auth', 'admin']], function() {
//    Route::get('admin', ['as' => 'admin_dashboard', 'uses' => 'Admin\AdminController@getHome']);
//    Route::resource('admin/profiles', 'Admin\AdminUsersController', ['only' => ['index', 'show', 'edit', 'update', 'destroy']]);
//});
# Admin Tables Routes
Route::group(['prefix' => 'admin', 'as' => 'admin', 'namespace' => 'Admin'], function() {
    Route::group(['prefix' => 'seguridad', 'namespace' => 'Seguridad'], function() {
        Route::controller('usuarios', 'UsuariosController');
        Route::controller('grupos', 'GruposController');
    });
    Route::group(['prefix' => 'tablas', 'as' => 'tablas', 'namespace' => 'Tablas'], function() {
        Route::controller('contenidos', 'ContenidosController');
    });
    Route::get('/', 'AdministrarController@getIndex');
});
