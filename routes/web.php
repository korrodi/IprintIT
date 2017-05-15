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
    return view('pages.welcome');
});

Route::get('users','UsersController@listUsers');
Route::get('users/create','UsersController@create')->name('users.create');
Route::post('users/create','UsersController@store')->name('users.store');
Route::get('users/edit/{user_id}', 'UsersController@editUser')->name('users.edit');
Route::post('users/delete/{user_id}', 'UsersController@deleteUser')->name('users.delete');
Route::patch('users/edit/{user_id}', 'UserController@updateUser')->name('users.update');
Route::get('departments','DepartmentsController@listDepartments');
Route::post('departments','DepartmentsController@listDepartments');

Auth::routes();
/* Problem logout Fixed */
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');
