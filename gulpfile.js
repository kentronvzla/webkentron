var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function (mix) {
    mix.less('app.less');
});

elixir(function (mix) {
    mix.styles([
        'navbar.css',
        'button.css',
        'panel.css',
        'carousel.css',
        'fuentes.css',
        'style.css',
        'estilomodal.css',
        'mediaqueries.css'
    ], null, 'public/assets/css/webkentron');
});

elixir(function(mix) {
    mix.scripts([
        "globales.js",
        "javascriptfunctions.js",
        "ajaxfunctions.js",
        "init.js",
    ], null, 'public/assets/js/webkentron');
});
