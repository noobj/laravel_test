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

Route::get('/', 'RecordController@index')->name('home');

Route::get('statistic', 'RecordController@statistic');
Route::post('statistic', 'RecordController@statistic');

Route::post('avatars', 'UserController@update');

Route::get('avatars', function() {
	return view('records.avatars');
})->middleware('auth');

Route::get('records/{date}', 'RecordController@index')->where('date', '[0-9]{4}_[0-9]{2}_[0-9]{2}');

Route::get('records/tag/{tag}', 'TagController@index');

Route::get('records/setting', function() {
	return view('records.setting');
})->middleware('auth');

Route::post('records/add_category', 'RecordController@addCategory');

Route::resource('dummies', 'DummiesController');

Route::resource('records', 'RecordController');


Auth::routes();

