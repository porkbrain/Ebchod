<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/**
 * 1 - Page routes
 */
Route::group(['namespace' => 'Sites'], function() {

	/* 1.1 - Index page */
	Route::get('', 'HomeController@index');
	Route::get('home', 'HomeController@index');

	/* 1.2 - Products */
	Route::group(['prefix' => 'products'], function() {
		Route::get('', 'ProductsController@index');
		Route::get('detail/{id}/{name?}', 'ProductsController@show');
	});

	/* 1.3 - Blog */
	Route::group(['prefix' => 'blog'], function() {
		Route::get('', 'BlogController@index');
		Route::get('add', 'BlogController@create');
		Route::post('add', 'BlogController@store');
		Route::post('delete', 'BlogController@destroy');
		Route::get('edit', 'BlogController@edit');
		Route::post('edit', 'BlogController@update');
	});

});

/**
 * 2 - Ajax
 */
Route::group(['prefix' => 'ajax'], function() {
	Route::post('autocomplete', 'AjaxController@autocomplete');
});

/**
 * 3 - Admin
 */
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
	Route::get('', 'AdminController@index'); // Index
	Route::get('logout', 'Auth\AuthController@getLogout');
	Route::get('add', 'AdminController@create'); // Add shop
	Route::post('add', 'AdminController@store'); // Add shop
	Route::get('edit', 'AdminController@edit'); // Edit shop
	Route::post('edit', 'AdminController@update'); // Edit shop
	Route::post('delete', 'AdminController@destroy'); // Delete shop
	Route::get('import', 'AdminController@import'); // Force import
	Route::get('statistics', 'AdminController@statistics'); // Statictics
});

Route::get('admin/login', 'Auth\AuthController@getLogin');
Route::post('admin/login','Auth\AuthController@postLogin');
Route::get('admin/register', 'Auth\AuthController@getRegister');
Route::post('admin/register', 'Auth\AuthController@postRegister');

/*****************************************************************
 *			Testing zone 									     *
 *****************************************************************/

/**
 * XmlImport Routes
 */
Route::get('xmlheureka', 'XmlFeedController@heurekaImport');





Route::get('test', function() {

});
