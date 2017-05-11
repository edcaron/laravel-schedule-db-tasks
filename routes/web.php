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

Route::get('/', function () {
    return view('welcome');
});

//Auth::routes();
// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
//Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//Route::post('register', 'Auth\RegisterController@register');
Route::get('register', 'HomeController@index')->name('register');
Route::post('register', 'HomeController@index')->name('register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/home', 'HomeController@index')->name('home');


//need to be autenticated to acess
Route::group(['middleware' => 'auth'], function () {

	//tasks
	Route::get('tasks', ['as'=>'tasks.index', 'uses'=>'TasksController@index']);
	Route::get('tasks/create', ['as'=>'tasks.create', 'uses'=>'TasksController@create']);
	Route::post('tasks/store', ['as'=>'tasks.store', 'uses'=>'TasksController@store']);
	Route::get('tasks/edit/{id}', ['as'=>'tasks.edit','uses'=>'TasksController@edit']);
	Route::put('tasks/update/{id}',['as'=>'tasks.update', 'uses'=>'TasksController@update']);
	Route::get('tasks/delete/{id}',['as'=>'tasks.delete', 'uses'=>'TasksController@delete']);
	Route::get('tasks/datatable',['as'=>'tasks.datatable', 'uses'=>'TasksController@datatable']);

	//users
	Route::get('users', ['as'=>'users.index', 'uses'=>'UsersController@index']);
	Route::get('users/create', ['as'=>'users.create', 'uses'=>'UsersController@create']);
	Route::post('users/store', ['as'=>'users.store','uses'=>'UsersController@store']);
	Route::get('users/edit/{id}', ['as'=>'users.edit', 'uses'=>'UsersController@edit']);
	Route::put('users/update/{id}',['as'=>'users.update', 'uses'=>'UsersController@update']);
	Route::get('users/delete/{id}',['as'=>'users.delete', 'uses'=>'UsersController@delete']);
	Route::get('users/datatable',['as'=>'users.datatable', 'uses'=>'UsersController@datatable']);

});