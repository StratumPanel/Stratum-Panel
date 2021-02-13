// @ts-nocheck
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
const mix = require('laravel-mix');

const tailwindcss = require('tailwindcss');

require('laravel-mix-purgecss');

/* const VuetifyLoaderPlugin = require('vuetify-loader/lib/plugin'); */
const CaseSensitivePathsPlugin = require('case-sensitive-paths-webpack-plugin');

var webpackConfig = {
    plugins: [
        /* new VuetifyLoaderPlugin(), */
        new CaseSensitivePathsPlugin(),
    ],
    module: {
        rules: [{
                test: /\.ts$/,
                loader: 'ts-loader',
                options: {
                    appendTsSuffixTo: [/\.vue$/]
                },
                exclude: /node_modules/,
            },
        ],
    },
    resolve: {
        extensions: ['.js', '.vue', '.ts', '.tsx'],
        alias: {
            /* '@': __dirname + '/resources/scripts' */
            '@client': __dirname + '/resources/client',
            '@admin': __dirname + '/resources/admin',
        }
    }
};

/* Mix.listen('configReady', config => {
    const scssRule = config.module.rules.find(r => r.test.toString() === /\.scss$/.toString())
    const scssOptions = scssRule.loaders.find(l => l.loader === 'sass-loader').options
    scssOptions.data = '@import "./resources/sass/variables.scss";'
  
    const sassRule = config.module.rules.find(r => r.test.toString() === /\.sass$/.toString())
    const sassOptions = sassRule.loaders.find(l => l.loader === 'sass-loader').options
    sassOptions.data = '@import "./resources/sass/variables.scss"'
}) */

mix.webpackConfig(webpackConfig);

mix.js('resources/client/main.ts', 'public/js/client').vue()
    .sass('resources/client/sass/app.scss', 'public/css/client')
    .options({    
        processCssUrls: false,    
        postCss: [ tailwindcss('./tailwind.config.js') 
    ]})
    .purgeCss();
