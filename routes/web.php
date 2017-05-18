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

/*Route::get('/', function () {
    return view('pages.welcome');
});*/
Route::get('/','RepresentController@listUsers')->name('users.index');

Route::get('/','RepresentController@listDepartments')->name('departments.index');


Route::get('users/show/{user_id}', 'UserController@showUser')->name('users.show');



Route::get('/register/verify/{user_id}', 'UserController@confirmRegistration')->name('user.confirm');

Route::get('users/edit/{user_id}', 'UserController@editUser')->name('users.edit');


Route::get('/handle-index','UserController@handleIndex');

Route::get('users/create','UserController@createUser')->name('users.create');
Route::post('users/create','UserController@store')->name('users.store');
Route::get('users/edit/{user_id}', 'UserController@editUser')->name('users.edit');
Route::patch('users/edit/{user_id}', 'UserController@updateUser')->name('users.update');


Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
