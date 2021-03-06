<?php

use App\Http\Controllers\PatientController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Patient;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Routes;
use App\User;

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

Route::group(
    ['middleware' => ['auth']],
    function () {
        Route::patch('/patients/update', 'App\Http\Controllers\PatientController@update')->name('patients.update');
        Route::post('/home', 'App\Http\Controllers\HomeController@upload');
        Route::resource('/patients', PatientController::class);

        Route::get('/admin', [
            'uses' => 'App\Http\Controllers\AdminController@index',
            'as' => 'admin',
            'middleware' => 'roles',
            'roles' => ['Admin']
        ]);

        Route::post('/admin/assign-roles', [
            'uses' => 'App\Http\Controllers\AdminController@adminAssignRoles',
            'as' => 'admin.assign',
            'middleware' => 'roles',
            'roles' => ['Admin']
        ]);
    }

);
Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::resource('/patients', PatientController::class);
// Route::get('/patients', [\App\Http\Controllers\PatientController::class, 'index'])->name('patients');
Route::get('/all_patients', [\App\Http\Controllers\PatientController::class, 'getAllPatients'])->name('patients.all');
Route::get('/patients_vs_months', [PatientController::class, 'patients_vs_months'])->name('graph.patients.months');
Route::post('/inference', [PatientController::class, 'inference'])->name('patient.inference');


Route::get('/patients_with_diabetes', [PatientController::class, 'patients_with_diabetes'])->name('graph.patients.withdiabetes');
Route::get('/patients_without_diabetes', [PatientController::class, 'patients_without_diabetes'])->name('graph.patients.withoutdiabetes');

