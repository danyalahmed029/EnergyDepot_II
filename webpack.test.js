'use strict'
// This is the webpack config used for unit tests.

let babelEnvDeps = require("webpack-babel-env-deps");
var path =require('path');
let webpack = require("webpack");
const webpackConfig = {
	// use inline sourcemap for karma-sourcemap-loader
	module: {
		rules: [
			{
				test: /\.vue$/,
				loader: 'vue-loader'
			},


			{
				test: /\.js$/,
				exclude: [
					babelEnvDeps.exclude()
				],
				use: {
					loader: 'babel-loader',
					options: {
						presets: [
							['env']
						]
					}
				}
			}
		]
	},
	devtool: '#inline-source-map',
resolve: {
    extensions: ['.js', '.vue', '.json'],
    modules: [path.resolve(__dirname, './node_modules')],
    alias: {
      'vue$': 'vue/dist/vue.common.js'
    }
  },
  resolveLoader: {
    modules: [path.join(__dirname, './node_modules')]
  },
	plugins: [
		new webpack.DefinePlugin({
			"process.env" : {
				NODE_ENV: '"production"'
			}
		})
	]
};

// no need for app entry during tests
delete webpackConfig.entry;

module.exports = webpackConfig;
