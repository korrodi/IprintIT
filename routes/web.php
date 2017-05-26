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
Route::get('/', 'LandingController@index')->name('landing.index');
Route::get('users', 'UserController@listUsers')->name('users.list');
Route::get('departments', 'DepartmentController@listDepartments')->name('departments.list');
//US 1.2
Route::get('users/show/{user_id}', 'UserController@showUser')->name('user.show');
Route::get('department/show/{department_id}', 'DepartmentController@showDepartment')->name('department.show');;
//US 1.4 / 3.3 (autenticado)
//f§alta (route::post) para receber os toggle de filtragem da lista Requests
/*
        Admin
*/
//US 2.1 / 2.5.1 / 2.7
Route::get('manage/', 'HomeController@index');
Route::get('manage/requests', 'PrintRequestController@listRequests')->name('requests.list');
Route::patch('manage/request/show/{request_id}', 'PrintRequestController@showRequest')->name('request.show');
Route::get('manage/printers', 'PrinterController@listPrinters')->name('printers.list');
Route::patch('manage/printers/show/{printer_id}', 'PrinterController@showPrinter')->name('printer.show');

//falta (route::post) para receber os toggle de filtragem da lista Requests/ Users/ Comentarios
//US 2.2
Route::patch('manage/request/show/{request_id}/toggleAccomplishedRequest', 'PrintRequestController@toggleRequest');
//US 2.3
Route::patch('manage/{request_id}/refuseRequest', 'PrintRequestController@refuseRequest');
//US 2.4
Route::patch('manage/request/show/{comment_id}/refuseComment', 'CommentController@refuseComment');
//US 2.5.2
Route::get('manage/comment/{comment_id}', 'CommentController@toggleBlockComment');
//US 2.6
Route::patch('manage/user/show/{user_id}/toggleBlockUser', 'UsersController@toggleUserBlock');
//US 2.8
Route::patch('manage/{user_id}/toggleAdmin', 'UsersController@toggleUserAdmin');
/*
        User
*/   
//US 1.6.2     
Route::get('/register/verify/{user_id}', 'UserController@confirmRegistration');
//US 3.2.1     
Route::get('request/create', 'PrintRequestController@createRequest');
//US 3.2.2
Route::post('request/create', 'PrintRequestController@addRequest');
//US 3.4.1
Route::get('request/edit/{request_id}', 'PrintRequestController@editRequest');
//US 3.     
Route::patch('request/edit/{request_id}', 'PrintRequestController@updateRequest');
//US 3.     
Route::post('/request/delete/{request_id}', 'PrintRequestController@deleteRequest')->name('request.delete');;


Route::get('user/edit/{user_id}', 'UserController@editUser')->name('users.edit');

Route::patch('user/edit/{user_id}', 'UserController@updateUser')->name('users.update');

//Comments
Route::post('comments/{request_id}', 'CommentsController@store');
