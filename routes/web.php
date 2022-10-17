<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ClinicController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\ProfessionController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
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

    Route::get('/profile/edit',[ProfileController::class,'edit'])
        ->name('user.edit');

    Route::get('/profile/{User}',[ProfileController::class,'show'])
        ->name('user.show');

    Route::resource('/profile',ProfileController::class);

    Route::get('/', [HomeController::class,'index']);

    Route::get('/home', [HomeController::class,'index']);

    Auth::routes();

    Route::prefix('admin')->name('admin.')->group(function(){

        Route::get('/login',[AuthController::class,'login'])
            ->name('login');

        Route::post('/login',[AuthController::class,'doLogin'])
            ->name('adminDoLogin');

        Route::group(['middleware' => 'adminauth'], function () {

            Route::resource('/roles',RoleController::class);

            Route::resource('/professions',ProfessionController::class);

        });

    });

    Route::get('/Department/{profession}/Doctors',[DoctorController::class,'professionDoctors'])
        ->name('dep.doctors');

    Route::get('/doctor/dashboard/Hospital/AddHospital',[DoctorController::class,'createHospital'])
        ->name('doctor.addHospital');

    Route::post('/doctor/dashboard/Hospital/AddHospital',[DoctorController::class,'storeHospital'])
        ->name('doctor.storeHospital');

    Route::resource('/doctor/dashboard',DoctorController::class);

    Route::get('/doctor/dashboard/Hospital/Show',[HospitalController::class,'showDoctor'])
        ->name('doctor.showHospital');

    Route::resource('/Hospital',HospitalController::class);

    Route::get('/clinic/edit',[ClinicController::class,'edit'])
        ->name('clinic.edit');

    Route::get('/clinic/show',[ClinicController::class,'show'])
        ->name('clinic.show');

    Route::resource('/Clinic',ClinicController::class);


    Route::get('/appointment/doctor/{user}/appointment/{appointment}',[AppointmentController::class,'bookMeeting'])
        ->name('appointments.bookmeeting');

    Route::post('/appointment/checkout/{app}',[AppointmentController::class,'checkout'])
        ->name('appointments.checkout');

    Route::get('/appointment/confirm',[AppointmentController::class,'confirm'])
        ->name('appointments.confirm');

    Route::get('/appointment/doctor/{user}',[AppointmentController::class,'meeting'])
        ->name('appointments.meeting');

    Route::post('/appointment/patient/{appointment}',[AppointmentController::class,'storemeeting'])
        ->name('appointments.storemeeting');

    Route::get('/appointment/edit',[AppointmentController::class,'edit'])
        ->name('appointments.edit');

    Route::get('/appointment/show',[AppointmentController::class,'show'])
        ->name('appointments.show');

    Route::put('/appointment/update',[AppointmentController::class,'update'])
        ->name('appointments.update');

    Route::resource('/appointment',AppointmentController::class);

