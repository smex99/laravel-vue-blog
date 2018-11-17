const mix = require('laravel-mix');

mix.scripts([
    'resources/js/video.js',
    'resources/js/feather.js',
    'resources/js/headroom.js',
    'resources/js/scrollreveal.min.js'
    ],
    'public/js/lib.js');

mix.styles([
    'resources/sass/css-lib/video-js.min.css',
    'resources/sass/css-lib/bootstrap.css'
    ],
    'public/css/style.css');

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');
