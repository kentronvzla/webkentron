<?php

Route::group([], function() {
    Route::get('/', ['as' => 'home', 'uses' => 'PagesController@getHome']);
    Route::get('soporte', ['as' => 'soporte', 'uses' => 'PagesController@getSupport']);
    Route::get('contacto', ['as' => 'contacto', 'uses' => 'PagesController@getContact']);
    Route::post('contacto', ['as' => 'contacto', 'uses' => 'PagesController@postContact']);
    Route::get('clientes', ['as' => 'clientes', 'uses' => 'PagesController@getCustomer']);
    Route::get('nosotros', ['as' => 'nosotros', 'uses' => 'PagesController@getAbout']);
    Route::get('infoproyecto/{id}', ['as' => 'infoproyecto', 'uses' => 'PagesController@getInfoProyecto']);
    Route::get('contenido/{url}', ['as' => 'contenido', 'uses' => 'PagesController@getShow']);

    Route::group(['prefix' => 'productos', 'as' => 'productos'], function() {
        Route::get('kerux', ['as' => 'kerux', 'uses' => 'PagesController@getKeruxInfo']);
        Route::get('komat', ['as' => 'komat', 'uses' => 'PagesController@getKomatInfo']);
        Route::get('/', 'PagesController@getProducts');
    });
});

Route::group(['middleware' => 'guest'], function() {
    # Registration
    Route::get('registration', ['as' => 'registration', 'uses' => 'RegistrationController@create']);
    Route::post('registration', ['as' => 'registration', 'uses' => 'RegistrationController@store']);
    # Authentication
    Route::get('login', ['as' => 'login', 'uses' => 'SessionsController@create']);
    # Forgotten Password
    Route::get('forgot_password', ['as' => 'forgot_password', 'uses' => 'Auth\PasswordController@getEmail']);
    Route::post('forgot_password', ['as' => 'forgot_password', 'uses' => 'Auth\PasswordController@postEmail']);
    Route::get('reset_password/{id}/{token}', ['as' => 'reset_password', 'uses' => 'Auth\PasswordController@getReset']);
    Route::post('reset_password', ['as' => 'reset_password', 'uses' => 'Auth\PasswordController@postReset']);
    
    Route::get('activate/{id}/{code}', ['as' => 'activate', 'uses' => 'Auth\RegistrationController@getActivation']);
});


Route::get('logout', ['as' => 'logout', 'uses' => 'SessionsController@destroy']);
Route::resource('sessions', 'SessionsController', ['only' => ['create', 'store', 'destroy']]);

# Admin Tables Routes
Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin', 'as' => 'admin', 'namespace' => 'Admin'], function() {
    Route::group(['prefix' => 'seguridad', 'namespace' => 'Seguridad'], function() {
        Route::controller('usuarios', 'UsuariosController');
        Route::controller('grupos', 'GruposController');
    });
    Route::group(['prefix' => 'tablas', 'as' => 'tablas', 'namespace' => 'Tablas'], function() {
        Route::controller('contenidos', 'ContenidosController');
    });
    Route::get('/', 'AdministrarController@getIndex');
});
