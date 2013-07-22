<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// http://raisa.betasites.mannyisles.com/

//Route::any('/',   'LoginController@login');

Route::any('help',   'HomeController@help');
Route::any('review',   'HomeController@review');
Route::any('myaccount',   'HomeController@myaccount');


Event::listen('illuminate.query', function($sql)
{
    //var_dump($sql);
}); 

// Public Routes

// Login
Route::any('login',   'LoginController@login');
Route::any('logout',  'LoginController@logout');

// Account
Route::any('register','AccountController@register');
Route::any('success', 'AccountController@success');

Route::any('verify/{code}','AccountController@verify');



// Resto
Route::any('video', 			'VideoController@index');

Route::any('video/search', 		'HomeController@search');

Route::any('reports/service', 		'ReportController@service');



//Route::resource('api/v1/videos', 'VideoApiController');
// Route group for API versioning
Route::group(array('prefix' => 'api/v1'), function()
{
	Route::get('videos/{id}/comments', 'VideoApiController@comments');
	
	Route::resource('videos', 'VideoApiController');
	Route::resource('ratings', 'RatingApiController');
	Route::resource('comments', 'CommentApiController');
						
});
	

// Secure routes
Route::group(array('before' => 'auth'), function()
{
	
	//Route::any('admin/video', 				'VideoController@index');
	Route::any('admin', 					'VideoController@index');
	Route::any('admin/video', 				'VideoController@index');
	Route::any('admin/video/add', 	  		'VideoController@add');
	Route::any('admin/video/edit/{id}', 	'VideoController@edit');
	Route::any('admin/video/delete/{id}',  'VideoController@delete');
		
	// Home
	Route::any('online',  			'HomeController@online');
	Route::any('ajax.online',  		'HomeController@ajaxonline');
	
	Route::any('profile', 			'AccountController@profile');
	Route::any('profile/edit', 		'AccountController@edit');
	Route::any('change_password', 	'AccountController@changePassword');
	
});



Route::any('/',   'LoginController@login');

