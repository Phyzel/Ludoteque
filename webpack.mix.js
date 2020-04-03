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

// Si on veut compiler un fichier qui est dans un nouveau dossier qu'on a créé il faut modifier l'url dans ce fichier.
mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/vendors/reset.scss', 'public/css')
    .sass('resources/sass/vendors/flickity-docs.scss', 'public/css');