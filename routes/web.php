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

Auth::routes();


//admin routes
Route::group(['middleware' => ['auth','admin']], function () {
    Route::get('/dashboard','DashboardController@dashboard');
    Route::get('/admin/groups','GroupController@create');
    Route::post('/group/store','GroupController@store');
    Route::post('/group/list','GroupController@grouplist');
    Route::post('/approve/{id}','ApproveController@approve')->name('approve');
    Route::delete('/delete/{id}','ApproveController@delete')->name('delete');
    Route::post('/users/list','ApproveController@userslist')->name('userslist');
    Route::post('/classeditprocess/{id}','ApproveController@classedit');
 
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/classlogin', 'HomeController@classlogin')->name('classlogin');
Route::get('/classloginprocess/{id}', 'HomeController@classloginprocess')->name('classloginprocess');




//teacher routes

Route::get('/assignments','AssignmentController@index')->name('assignment');
Route::post('/assignments/show/{id}','AssignmentController@show')->name('assignmentdashboard');
Route::get('/assignments/show/{id}','AssignmentController@show')->name('assignmentdashboard');
Route::get('/assignments/create/{id}','AssignmentController@create')->name('assignmentform');
Route::post('/assignments/store/{id}','AssignmentController@store')->name('assignmentstore');
Route::delete('/assignments/delete/{id}','AssignmentController@destroy')->name('assignmentdelete');
Route::get('/assignments/edit/{id}','AssignmentController@edit')->name('assignmentedit');
Route::post('/assignments/update/{id}','AssignmentController@update')->name('assignmentupdate');




Route::get('/assignments/details/{id}','AssignmentController@details')->name('assignmentdetails');
Route::post('/assignments/givepoints/{id}','StudentController@points')->name('assignmentpoints');


Route::get('/student/assignments/show','StudentController@show')->name('Stdashboard');
Route::get('/student/assignments/details/{id}','StudentController@details')->name('Stdetails');
Route::post('student/assignments/store/{id}','StudentController@store')->name('Ststore');
Route::post('student/assignments/edit/{id}','StudentController@update')->name('Stedit');

Route::get('chartjs/{id}', 'AssignmentController@chartjs')->name('progresschart');
Route::get('/notifications', 'HomeController@notification');















