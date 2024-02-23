<?php

use App\Http\Controllers\EmployeeWorkerCountController;
use App\Http\Controllers\EnergyDataController;
use App\Http\Controllers\HiringCountController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// use App\Http\Controllers\CheckController;

Route::get('/', function () {
    return view('auth.login');
});

// Route::get('/checkuser/{id}', [App\Http\Controllers\CheckController::class, 'checkuser'])->name('checkuser');

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');


Route::prefix('user')->middleware('user')->group(function () { 
    Route::get('/dashboard', [UserController::class,'index'])->name('user.dashboard');
    Route::get('/commuteform', [UserController::class,'commuteform'])->name('user.commuteform');
    Route::get('/financialyear', [UserController::class,'financialyear'])->name('user.financialyear');
    Route::post('/generateyear', [UserController::class,'generatefinancialyear'])->name('user.generateyear');

    
    Route::resource('energy_data',EnergyDataController::class);
Route::post('/addmonth', [EnergyDataController::class,'addmonth'])->name('addmonth');

Route::controller(EmployeeWorkerCountController::class)->group(function(){
    Route::get('/employee_count/index','employee_index')->name('employeecount.index');
    Route::get('/employee_count/edit/{id}','employee_edit')->name('employeecount.edit');
    Route::patch('/employee_count/update/{id}','employee_update')->name('employeecount.update');
    Route::get('/worker_count/index','worker_index')->name('workercount.index');
    Route::get('/worker_count/edit/{id}','worker_edit')->name('workercount.edit');
    Route::patch('/worker_count/update/{id}','worker_update')->name('workercount.update');
});

Route::controller(HiringCountController::class)->group(function(){
    Route::get('/hiring/employee_count/index','employee_index')->name('hiring.employeecount.index');
    Route::get('/hiring/employee_count/edit/{id}','employee_edit')->name('hiring.employeecount.edit');
    Route::patch('/hiring/employee_count/update/{id}','employee_update')->name('hiring.employeecount.update');
    Route::get('/hiring/worker_count/index','worker_index')->name('hiring.workercount.index');
    Route::get('/hiring/worker_count/edit/{id}','worker_edit')->name('hiring.workercount.edit');
    Route::patch('/hiring/worker_count/update/{id}','worker_update')->name('hiring.workercount.update');
});

});
