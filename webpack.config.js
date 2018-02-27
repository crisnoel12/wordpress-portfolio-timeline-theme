var webpack = require('webpack');
var path = require('path');
const glob = require('glob');
const ExtractTextPlugin = require("extract-text-webpack-plugin"); // Extract CSS to dedicated file.
const PurifyCSSPlugin = require('purifycss-webpack');
var inProduction = (process.env.NODE_ENV === 'production');

module.exports = {
    entry: './index.js',
    output: {
        path: path.resolve(__dirname),
        filename: 'bundle.js'
    },
    module: {
        rules: [
            {
                test: /\.s[ac]ss$/,
                use: ExtractTextPlugin.extract({
                    use: ['css-loader', 'sass-loader'],
                    fallback: 'style-loader'
                })
            },
            {
                test: /\.js$/,
                exclude: /node_modules/,
                loader: "babel-loader"
            }
        ]
    },
    plugins: [
        new ExtractTextPlugin('style.css'),
        new webpack.LoaderOptionsPlugin({
            minimize: inProduction
        })
    ]
};
