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
/*
        Laravel
*/
//US 1.6.1 / 1.7 / 3.1
Auth::routes();
/*
        Landing Page
*/
//US 1.1 / 1.3
Route::get('/', 'LandingController@index');
//US 1.2
Route::get('/department/show/{department_id}', 'DepartmentController@index');
//US 1.4 / 3.3 (autenticado)
Route::get('/user/show/{user_id}', 'UserController@showUser')->name('users.show');
//falta (route::post) para receber os toggle de filtragem da lista Requests
/*
        Admin
*/
//US 2.1 / 2.5.1 / 2.7
Route::get('manage/', ['uses' => 'ProfileController@index', 'middleware' => 'admin']);
//falta (route::post) para receber os toggle de filtragem da lista Requests/ Users/ Comentarios
//US 2.2
Route::patch('manage/request/show/{request_id}/toggleAccomplishedRequest', ['uses' => 'RequestController@toggleRequest', 'middleware' => 'admin']);
//US 2.3
Route::patch('manage/{request_id}/refuseRequest', ['uses' => 'RequestController@refuseRequest', 'middleware' => 'admin']);
//US 2.4
Route::patch('manage/request/show/{comment_id}/refuseComment',['uses' => 'CommentController@refuseComment', 'middleware' => 'admin']);
//US 2.5.2
Route::get('manage/comment/{comment_id}',['uses' => 'CommentController@toggleBlockComment', 'middleware' => 'admin']);
//US 2.6
Route::patch('manage/user/show/{user_id}/toggleBlockUser', ['uses' => 'UsersController@toggleUserBlock', 'middleware' => 'admin']);
//US 2.8
Route::patch('manage/{user_id}/toggleAdmin', ['uses' => 'UsersController@toggleUserAdmin', 'middleware' => 'admin']);
/*
        User
*/   
//US 1.6.2     
Route::get('/register/verify/{user_id}', 'UserController@confirmRegistration');
//US 3.2.1     
Route::get('request/create', 'RequestController@createRequest');
//US 3.2.2
Route::post('request/create', 'RequestController@addRequest');
//US 3.4.1
Route::get('request/edit/{request_id}', 'RequestController@editRequest');
//US 3.     
Route::patch('request/edit/{request_id}', 'RequestController@updateRequest');
//US 3.     
Route::post('/request/delete/{request_id}', 'RequestController@deleteRequest');
