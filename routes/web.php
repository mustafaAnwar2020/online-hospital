<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/profile/edit','App\Http\Controllers\ProfileController@edit')->name('user.edit');
Route::get('/', 'App\Http\Controllers\HomeController@index');
Route::get('/home', 'App\Http\Controllers\HomeController@index');

Auth::routes();


Route::prefix('admin')->name('admin.')->group(function(){
    Route::resource('/roles','App\Http\Controllers\RoleController');
    Route::resource('/professions','App\Http\Controllers\ProfessionController');

});



Route::get('/Department/{profession}/Doctors','App\Http\Controllers\DoctorController@professionDoctors')->name('dep.doctors');
Route::get('/doctor/dashboard/Hospital/Show','App\Http\Controllers\HospitalController@showDoctor')->name('doctor.showHospital');
Route::get('/doctor/dashboard/Hospital/AddHospital','App\Http\Controllers\DoctorController@createHospital')->name('doctor.addHospital');
Route::post('/doctor/dashboard/Hospital/AddHospital','App\Http\Controllers\DoctorController@storeHospital')->name('doctor.storeHospital');
Route::resource('/doctor/dashboard','App\Http\Controllers\DoctorController');

Route::resource('/Hospital','App\Http\Controllers\HospitalController');
Route::get('/clinic/edit','App\Http\Controllers\ClinicController@edit')->name('clinic.edit');
Route::get('/clinic/show','App\Http\Controllers\ClinicController@show')->name('clinic.show');
Route::resource('/Clinic','App\Http\Controllers\ClinicController');
Route::get('/appointment/doctor/{user}/appointment/{appointment}','App\Http\Controllers\AppointmentController@bookMeeting')->name('appointments.bookmeeting');
Route::post('/appointment/checkout/{app}','App\Http\Controllers\AppointmentController@checkout')->name('appointments.checkout');
Route::get('/appointment/confirm','App\Http\Controllers\AppointmentController@confirm')->name('appointments.confirm');
Route::get('/appointment/doctor/{user}','App\Http\Controllers\AppointmentController@meeting')->name('appointments.meeting');
Route::post('/appointment/patient/{appointment}','App\Http\Controllers\AppointmentController@storemeeting')->name('appointments.storemeeting');
Route::get('/appointment/edit','App\Http\Controllers\AppointmentController@edit')->name('appointments.edit');
Route::get('/appointment/show','App\Http\Controllers\AppointmentController@show')->name('appointments.show');
Route::put('/appointment/update','App\Http\Controllers\AppointmentController@update')->name('appointments.update');
Route::resource('/appointment','App\Http\Controllers\AppointmentController');

Route::get('/profile/{User}','App\Http\Controllers\ProfileController@show')->name('user.show');

Route::resource('/profile','App\Http\Controllers\ProfileController');

