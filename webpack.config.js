const path = require('path');

module.exports = {
    resolve: {
        extensions: ['.js', '.vue', '.ts', '.tsx'],
        alias: {
            '@': path.resolve('resources/js'),
            '@components': path.resolve('resources/js/components'),
            '@assets': path.resolve('resources/assets'),
        },
    },
};
