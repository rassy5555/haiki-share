const mix = require('laravel-mix');
// require("@babel/polyfill");


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
// mix.options({
//   polyfills: [
//     'Promise'
//   ]
// })
// module.exports = {
//     entry: ["@babel/polyfill", "./app/js"],
// };

mix.js(['resources/js/app.js','resources/js/jQuery.js'], 'public/js')
    .sass('resources/sass/app.scss', 'public/css');
