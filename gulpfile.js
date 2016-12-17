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

elixir(mix => {
   //mix.sass('app.scss')
  	mix.webpack('app.js')
  //	mix.less('./resources/assets/semantic/src/semantic.less', 'public/css/admin.css')
    //mix.copy('node_modules/bootstrap-sass/assets/fonts/bootstrap/','public/fonts/bootstrap')
	/*
  	mix.copy([
  		'node_modules/jquery/dist/jquery.min.js',
  		'node_modules/tinymce/tinymce.min.js',
  	], 'public/js')
  	*/

});
