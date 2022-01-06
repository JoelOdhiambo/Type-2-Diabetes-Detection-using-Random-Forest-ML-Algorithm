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

Route::group(['middleware' => ['auth']],function () {
        Route::get('/patients', [
            'uses'=>'App\Http\Controllers\PatientController@index',
            'as'=>'patients.patients',
            'middleware'=>'roles',
            'roles'=>['Doctor','Admin']
        ]);

        Route::post('/home','App\Http\Controllers\HomeController@upload');
        Route::post('/patients', [
            'uses'=>'App\Http\Controllers\PatientController@store',
            'as'=>'patients.patients',
            'middleware'=>'roles',
            'roles'=>['Doctor','Admin']
        ]);

        Route::post('/patients/{{$patient->id}}', [
            'uses'=>'App\Http\Controllers\PatientController@edit',
            'as'=>'patients.patients',
            'middleware'=>'roles',
            'roles'=>['Doctor','Admin']
        ]);

        Route::post('/patients', [
            'uses'=>'App\Http\Controllers\PatientController@destroy',
            'as'=>'patients.patients',
            'middleware'=>'roles',
            'roles'=>['Doctor','Admin']
        ]);

        Route::post('/patients', [
            'uses'=>'App\Http\Controllers\PatientController@update',
            'as'=>'patients.patients',
            'middleware'=>'roles',
            'roles'=>['Doctor','Admin']
        ]);

        Route::get('/admin', [
            'uses'=>'App\Http\Controllers\AdminController@index',
            'as'=>'admin',
            'middleware'=>'roles',
            'roles'=>['Admin']
        ]);
       
        Route::post('/admin/assign-roles',[
            'uses'=>'App\Http\Controllers\AdminController@adminAssignRoles',
            'as'=>'admin.assign',
            'middleware'=>'roles',
            'roles'=>['Admin']
        ]);
    }

);
Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::resource('/patients', PatientController::class);
// Route::get('/patients', [\App\Http\Controllers\PatientController::class, 'index'])->name('patients');
        
Route::get('/patients_vs_months', [PatientController::class, 'patients_vs_months'])->name('graph.patients.months');
