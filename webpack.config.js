var webpackStream = require('webpack-stream');
var webpack = require('webpack');

module.exports = {
    devtool: 'source-map',
    entry: './src/js/scripts.js',
    output: {
      filename: 'scripts.min.js'
    },
    module: {
      loaders: [
        {
          test: /\.(eot|ico|ttf|woff|woff2|gif|jpe?g|png|svg)$/,
          exclude: /node_modules/,
          loader: 'file-loader'
        },
        {
          test: /\.js$/,
          exclude: /node_modules/,
          loader: 'babel?presets[]=es2015,cacheDirectory'
        },
        {
          test: /jquery/,
          loader: 'expose?$!expose?jquery'
        }
      ]
    },
    plugins: [
      new webpack.ProvidePlugin({
           $: "jquery",
           jQuery: "jquery"
      })
      /*,
      new webpack.optimize.UglifyJsPlugin({
        minimize: true,
        compress: {
          warnings: false
        },
        output: {
          comments: false
        },
        mangle: {
          except: ['jQuery', '$']
        }
      })*/
    ]
};
