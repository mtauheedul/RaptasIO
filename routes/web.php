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



Route::GET('/countEmp', 'AdminController@countEmp');

Route::POST('/store/emp', 'AdminController@store');
Route::GET('/new/emp', 'AdminController@getEmpList');



Route::POST('/verify', 'AdminController@checkStatusEmp');
Route::POST('/emp/attendance/IN', 'AdminController@attendanceIN');
Route::POST('/emp/attendance/OUT', 'AdminController@attendanceOUT');


Route::GET('/getLog', 'AdminController@getLog');

Route::GET('/updateEmp', 'AdminController@updateEmpView');
Route::POST('/doneupdateEmp', 'AdminController@updateEmp');
Route::POST('/destroy', 'AdminController@destroy');

Route::GET('/getHoliday', 'AdminController@getHoliday');




Route::GET('/test', 'AdminController@test');





Route::POST('/SetWorkHour', 'AdminController@SetWorkHour');
Route::POST('/SetActive', 'AdminController@SetActive');
Route::POST('/SetDeActive', 'AdminController@SetDeActive');
Route::POST('/DeleteState', 'AdminController@DeleteState');

Route::POST('/calculateAtt', 'AdminController@calculateAtt'); 

Route::GET('/getGraphView', 'AdminController@getGraphView');



Route::GET('/holidayView', 'AdminController@holidayView');
Route::GET('/WorkHourView', 'AdminController@WorkHourView');
Route::POST('/holidayDelete', 'AdminController@holidayDelete');
Route::POST('/holidayAdd', 'AdminController@holidayAdd');



Route::GET('/getLeaveView', 'AdminController@getLeaveView');

Route::POST('/setYearlyLeave', 'AdminController@setYearlyLeave');
Route::POST('/yearlySetDeactive', 'AdminController@yearlySetDeactive');
Route::POST('/yearlySetActive', 'AdminController@yearlySetActive');
Route::POST('/yearlySetDelete', 'AdminController@yearlySetDelete');

Route::POST('/ApplyForLeave', 'AdminController@ApplyForLeave');
Route::POST('/LeaveSetActive', 'AdminController@LeaveSetActive');

Route::POST('/LeaveDelete', 'AdminController@LeaveDelete');

Route::GET('/getHolidayView', 'AdminController@getHolidayView');





Route::GET('/searchView', 'AdminController@searchView');
Route::GET('/get/attendance/view', 'AdminController@attendanceView');
Route::GET('/expiredWindow', 'UserController@expiery');
Route::GET('/regNewPass', 'UserController@regNewPass');

Route::GET('admin/home','AdminController@index');

Route::GET('admin/register','Admin\LoginController@register');
Route::POST('ad/reg','Admin\LoginController@StoreRegister');

Route::GET('admin/newPass','AdminController@getPsView');
Route::POST('ad/ps','AdminController@storePass');

Route::GET('admin','Admin\LoginController@showLoginForm')->name('admin.login');
Route::POST('admin','Admin\LoginController@login');

Route::POST('admin-password/email','Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::GET('admin-password/email','Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::POST('admin-password/reset','Admin\ResetPasswordController@reset');
Route::GET('admin-password/reset{token}','Admin\ForgotPasswordController@showResetForm')->name('admin.password.reset');





