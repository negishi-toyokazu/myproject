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
   .sass('resources/sass/question.scss', 'public/css')
   .sass('resources/sass/sighin.scss', 'public/css')
   .sass('resources/sass/register.scss', 'public/css')
   .sass('resources/sass/top.scss', 'public/css')
   .sass('resources/sass/detail.scss', 'public/css')
   .sass('resources/sass/mypage.scss', 'public/css')
   .sass('resources/sass/content.scss', 'public/css');
