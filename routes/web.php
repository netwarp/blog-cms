<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'BlogController@getIndex');

Route::get('/recherche', ['as' => 'getRecherche', 'uses' => 'BlogController@getSearch']);

Route::get('/article/{id}/{slug}', 'BlogController@getArticle');

Route::post('/article/{id}', 'BlogController@postComment');

Route::post('newsletters', 'BlogController@postNewsletters');

Route::get('/login', ['as' => 'getLogin', 'uses' => 'BlogController@getLogin']);

Route::post('/login', 'BlogController@postLogin');

Route::get('/a-propos', ['as' => 'getApropos', 'uses' => 'BlogController@getApropos']);

Route::get('/projets', 'BlogController@getProjets');

Route::get('/contact', 'BlogController@getContact');

Route::post('/contact', 'BlogController@postContact');

Route::get('/tag/{tag}', ['as' => 'getTag', 'uses' => 'BlogController@getTag']);

Route::get('/phpinfo', function() { phpinfo();});

Route::get('/test', 'BlogController@getTest');

Route::post('/test', 'BlogController@postTest');


Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['prefix' => 'api', 'namespace' => 'Api'], function() {
	Route::get('source/articles/{id}/{file}', 'ApiController@source');

	Route::get('upload', 'ApiController@upload');
});

Route::group(['middleware' => 'auth', 'namespace' => 'Admin', 'prefix' => 'admin', 'as' => 'admin.'], function() {
	
	Route::get('/', ['as' => 'index', 'uses' => 'AdminController@getIndex']);

	Route::resources([
		'articles' => 'ArticlesController',
		'comments' => 'CommentsController',
		'messages' => 'MessagesController',
	]);

	Route::group(['prefix' => 'backups', 'as' => 'backups.'], function() {
	    Route::get('/', ['as' => 'index', 'uses' => 'BackupsController@index']);
	    Route::get('make', ['as' => 'make', 'uses' => 'BackupsController@make']);
	    Route::post('upload', ['as' => 'upload', 'uses' => 'BackupsController@upload']);
        Route::get('download/{file}', ['as' => 'download', 'uses' => 'BackupsController@download']);
	    Route::get('delete/{file}', ['as' => 'delete', 'uses' => 'BackupsController@delete']);
    });
});
