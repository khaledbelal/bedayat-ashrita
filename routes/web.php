<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/ 
Auth::routes();

Route::group(['middleware' => 'auth'], function () { 
	/* ======================================= cpanel ===================================== */  
	//Home
	Route::get('cpanel', 'HomeController@cpanelHome')->name('cpanel-home');

	//Sheikhs
	Route::get('cpanel/sheikhs', 'SheikhController@index')->name('cpanel-sheikhs');
	Route::get('cpanel/sheikhs/create', 'SheikhController@create')->name('cpanel-add-sheikh');
	Route::post('cpanel/sheikhs/store', 'SheikhController@store')->name('cpanel-store-sheikh');
	Route::get('cpanel/sheikhs/edit/{slug}', 'SheikhController@edit')->name('cpanel-edit-sheikh');
	Route::put('cpanel/sheikhs/update/{slug}', 'SheikhController@update')->name('cpanel-update-sheikh');
	Route::delete('cpanel/sheikhs/delete/{slug}', 'SheikhController@destroy')->name('cpanel-delete-sheikh');
	Route::get('cpanel/sheikhs/active/{slug}', 'SheikhController@active')->name('cpanel-active-sheikh');
 
	//Moqdmat
	Route::get('cpanel/moqdmat', 'MoqdmaController@index')->name('cpanel-moqdmat');
	Route::get('cpanel/moqdmat/create', 'MoqdmaController@create')->name('cpanel-add-moqdma');
	Route::post('cpanel/moqdmat/upload', 'MoqdmaController@uploadFiles')->name('cpanel-upload-moqdma');
	Route::post('cpanel/moqdmat/store', 'MoqdmaController@store')->name('cpanel-store-moqdma');
	Route::get('cpanel/moqdmat/edit/{slug}', 'SheikhController@edit')->name('cpanel-edit-moqdma');
	Route::put('cpanel/moqdmat/update/{slug}', 'SheikhController@update')->name('cpanel-update-moqdma');
	Route::delete('cpanel/moqdmat/delete/{slug}', 'SheikhController@destroy')->name('cpanel-delete-moqdma');
	Route::get('cpanel/moqdmat/active/{slug}', 'MoqdmaController@active')->name('cpanel-active-moqdma');
});

/* ======================================= Front-end ===================================== */  
Route::get('/', 'HomeController@index')->name('home');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/contact', 'HomeController@contact')->name('contact');

//Moqdmat
Route::get('/moqdmat/increaseView', 'MoqdmaController@increaseView')->name('increase-view');
Route::get('/moqdmat', 'MoqdmaController@index')->name('all-moqdmat');
Route::get('/moqdmat/sheikh/{slug}', 'MoqdmaController@sheikh')->name('sheikh-moqdmat');
Route::get('/moqdmat/filter/{slug}', 'MoqdmaController@filter')->name('moqdmat-filter');
Route::get('/moqdmat/listen/{slug}', 'MoqdmaController@show')->name('moqdma-listen');
Route::post('/moqdmat/search', 'MoqdmaController@search')->name('moqdmat-search');

//Sheikhs
Route::get('/sheikhs', 'SheikhController@index')->name('all-sheikhs');
Route::get('/sheikhs/filter/{slug}', 'SheikhController@filter')->name('sheikh-filter');