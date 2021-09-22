const path = require('path');

module.exports = {
    resolve: {
        extensions: ['.js', '.vue', '.ts', '.tsx'],
        alias: {
            '@components': path.resolve('resources/js/components'),
            '@assets': path.resolve('resources/assets'),
            '@api': path.resolve('resources/js/api'),
            '@': path.resolve('resources/js'),
        },
    },
};
