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
    .sass('resources/sass/app.scss', 'public/css');
mix.styles([
    'public/css/vendor/normalize.css',
    'public/css/vendor/videojs.css'
], 'public/css/all.css');

//これ以下を更新すると、npm run devでエラー、、保留

//この３つは自分で考えた
// mix.styles('resources/css/start.css', 'public/css')
// mix.styles('resources/css/main.css', 'public/css')
// mix.styles('resources/css/content.css', 'public/css')

//コピペ
// let mix = require('laravel-mix');
//
// mix
//     .disableNotifications()
//     .js('resources/assets/js/app.js', 'public/js')
//     .sass('resources/assets/sass/app.scss', 'public/css')
//     .options({
//         postCss: [
//             require('autoprefixer')
//         ]
//     });
//
// if (mix.config.inProduction) {
//     mix.version();
// } else {
//     mix.browserSync({
//         proxy:     'localhost:8000',
//         startPath: '/'
//     });
// }
