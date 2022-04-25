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

/*  mix.options({
    hmrOptions: {
        host: "web",
        port: 8080
    }
}) */

mix.js('resources/js/main.ts', 'public/js').vue()
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
    ]).options({
        hmrOptions: {
            host: "0.0.0.0",
            port: 4206
        }
    })
    .webpackConfig(require('./webpack.config'));

/*  mix.browserSync('stratum.test') */

/* mix.browserSync({
    open: false,
    proxy: {
        target: "nginx", // replace with your web server container
        proxyReq: [
            function(proxyReq) {
                proxyReq.setHeader('HOST', 'localhost:3000'); // replace with your site host
            }
        ]
    }
}) */


if (mix.inProduction()) {
    mix.version();
}
