let mix = require('laravel-mix');
let babelEnvDeps = require("webpack-babel-env-deps");
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

mix.webpackConfig({
	module: {
		rules: [
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
	}
});
mix.setPublicPath('./');
mix.js(['resources/assets/js/app.js'], "public/js/app.js")
   .sass('resources/assets/sass/app.scss', 'public/css').options({
	processCssUrls: false
}).sourceMaps();
