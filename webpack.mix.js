const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .copyDirectory('resources/styles', 'public/styles')
    .copyDirectory('resources/images', 'public/images')
    .copyDirectory('resources/js/plugins', 'public/js/plugins')
    .copyDirectory('resources/js/scripts', 'public/js/scripts')
    .copyDirectory('resources/js/vendors', 'public/js/vendors')
    .copyDirectory('resources/fonts', 'public/fonts');
