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

//Route::any('/',   'LoginController@login');

Route::any('review',   'HomeController@review');
Route::any('myaccount',   'HomeController@myaccount');


Event::listen('illuminate.query', function($sql)
{
    //var_dump($sql);
}); 

// Public Routes

// Login
Route::any('/',   'LoginController@login');
Route::any('login',   'LoginController@login');
Route::any('logout',  'LoginController@logout');

// Account
Route::any('register','AccountController@register');
Route::any('success', 'AccountController@success');


// Service Reports
Route::group(array('prefix' => 'reports/service'), function()
{
	Route::any('/', 							'ServiceReportController@index');
	Route::any('add', 							'ServiceReportController@serviceAdd');
	Route::any('edit/{id}', 					'ServiceReportController@serviceEdit');
	Route::any('delete/{id}', 					'ServiceReportController@serviceDelete');
	Route::any('view/{id}', 					'ServiceReportController@serviceView');
	Route::any('approved/{id}', 				'ServiceReportController@approveReport');
	Route::any('not-approved/{id}', 			'ServiceReportController@notApproveReport');
	Route::any('download/{id}', 				'ServiceReportController@downloadAttachment');
	Route::any('delete-attachment/{id}/{report_id}', 	'ServiceReportController@deleteAttachment');
	
	Route::any('history', 							'ServiceReportController@updateHistory');
	Route::any('history-info', 						'ServiceReportController@historyInfo');
	Route::any('delete-history/{id}/{report_id}', 	'ServiceReportController@deleteHistory');
});

// Announce Reports
Route::group(array('prefix' => 'reports/announce'), function()
{
	Route::any('/', 							'AnounceReportController@index');
	Route::any('add', 							'AnounceReportController@announceAdd');
	Route::any('edit/{id}', 					'AnounceReportController@announceEdit');
	Route::any('delete/{id}', 					'AnounceReportController@announceDelete');
	Route::any('view/{id}', 					'AnounceReportController@serviceView');
	Route::any('approved/{id}', 				'AnounceReportController@approveReport');
	Route::any('not-approved/{id}', 			'AnounceReportController@notApproveReport');
	Route::any('download/{id}', 				'AnounceReportController@downloadAttachment');
	Route::any('delete-attachment/{id}/{report_id}', 	'AnounceReportController@deleteAttachment');
	
	Route::any('history', 							'AnounceReportController@updateHistory');
	Route::any('history-info', 						'AnounceReportController@historyInfo');
	Route::any('delete-history/{id}/{report_id}', 	'AnounceReportController@deleteHistory');
});



Route::any('preview/service/{id}', 				'PreviewController@service');


// Secure routes 
Route::group(array('before' => 'auth'), function() 
{       
    Route::any('home',                      'HomeController@index');       
});

// Clients
Route::group(array('prefix' => 'clients'), function()
{
	Route::get('/', 'ClientController@index');
	Route::get('add', 'ClientController@clientAdd');
	Route::post('add/submit', 'ClientController@clientHandleAdd');
	Route::any('edit/{uid}', 'ClientController@clientEdit');
	Route::any('delete/{uid}', 'ClientController@clientDelete');
});

// Objects
Route::group(array('prefix' => 'objects'), function()
{
	Route::get('/', 'ObjectController@index');
	Route::get('add', 'ObjectController@objectAdd');
	Route::post('add/submit', 'ObjectController@objectHandleAdd');
	Route::any('edit/{uid}', 'ObjectController@objectEdit');
	Route::any('delete/{uid}', 'ObjectController@objectDelete');
});

// Projects
Route::group(array('prefix' => 'projects'), function()
{
	Route::get('/', 'ProjectController@index');
	Route::get('view/{uid}', 'ProjectController@details');
	Route::get('add', 'ProjectController@projectAdd');
	Route::post('add/submit', 'ProjectController@projectHandleAdd');
	Route::any('edit/{uid}', 'ProjectController@projectEdit');
	Route::any('delete/{uid}', 'ProjectController@projectDelete');
});


//Company
Route::any('company/lists', 		'CompanyController@lists');
Route::any('company/add', 			'CompanyController@add');
Route::any('company/edit/{id}', 	'CompanyController@edit');
Route::any('company/delete/{id}',   'CompanyController@delete');


//User
Route::any('user/lists', 		'UserController@lists');
Route::any('user/add', 			'UserController@add');
Route::any('user/edit/{id}', 	'UserController@edit');
Route::any('user/delete/{id}',   'UserController@delete');


