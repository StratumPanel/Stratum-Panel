const path = require('path');

module.exports = {

    output: {
        publicPath: 'http://localhost:4206/',
    },
    resolve: {
        extensions: ['.js', '.vue', '.ts', '.tsx'],
        alias: {
            '@components': path.resolve('resources/js/components'),
            '@assets': path.resolve('resources/assets'),
            '@api': path.resolve('resources/js/api'),
            '@layouts': path.resolve('resources/js/Layouts'),
            '@pages': path.resolve('resources/js/Pages'),
            '@': path.resolve('resources/js'),
        },
    },
};
