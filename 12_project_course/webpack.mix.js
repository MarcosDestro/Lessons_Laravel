const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix
    .sass('resources/views/front/assets/sass/style.scss',
    'public/front/assets/css/style.css')
    
    .combine([
    'resources/views/front/assets/css/animate.css',
    'resources/views/front/assets/css/icomoon.css',
    'resources/views/front/assets/css/bootstrap.css',
    'resources/views/front/assets/css/magnific-popup.css',
    'resources/views/front/assets/css/owl.carousel.min.css',
    'resources/views/front/assets/css/owl.theme.default.min.css'
    ], 'public/front/assets/css/vendor.css')
    
    .js([
        'resources/views/front/assets/js/modernizr-2.6.2.min.js'
    ], 'public/front/assets/js/modernizr.js')
    
    .js([
        'resources/views/front/assets/js/respond.min.js'
    ], 'public/front/assets/js/respond.js')
    
    .combine([
        'resources/views/front/assets/js/jquery.min.js',
        'resources/views/front/assets/js/jquery.easing.1.3.js',
        'resources/views/front/assets/js/bootstrap.min.js',
        'resources/views/front/assets/js/jquery.waypoints.min.js',
        'resources/views/front/assets/js/jquery.stellar.min.js',
        'resources/views/front/assets/js/owl.carousel.min.js',
        'resources/views/front/assets/js/jquery.countTo.js',
        'resources/views/front/assets/js/jquery.magnific-popup.min.js',
        'resources/views/front/assets/js/magnific-popup-options.js'
    ], 'public/front/assets/js/vendor.js')

    .js([
        'resources/views/front/assets/js/main.js'
    ], 'public/front/assets/js/main.js')
    
    //.copy('resources/views/front/assets/js/jquery.countTo.js','public/front/assets/js/jquery.countTo.js')
    
    .copyDirectory('resources/views/front/assets/fonts','public/front/assets/fonts')
    .copyDirectory('resources/views/front/assets/images','public/front/assets/images')

    .options({
        processCssUrls: false
    })
    
    .version();
