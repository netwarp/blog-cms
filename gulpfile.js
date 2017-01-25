const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
//	mix.copy('./node_modules/bootstrap-sass/assets/stylesheets/**/*', './resources/assets/sass/boostrap')

	//mix.copy('./node_modules/jquery/dist/jquery.min.js', './public/js/jquery.min.js')

	//mix.copy('./node_modules/tinymce/tinymce.js', './public/js/tinymce.js')
	//mix.copy('./node_modules/materialize-css/dist/js/materialize.js', './public/js/materialize.js')

   mix.sass('app.scss')
  	//mix.webpack('app.js')

	/*
  	mix.copy([
  		'node_modules/jquery/dist/jquery.min.js',
  		'node_modules/tinymce/tinymce.min.js',
  	], 'public/js')
  	*/

});
