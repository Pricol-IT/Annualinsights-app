<?php

use App\Http\Controllers\DifferentlyAbledController;
use App\Http\Controllers\EmployeeWorkerBenefitController;
use App\Http\Controllers\EmployeeWorkerCountController;
use App\Http\Controllers\EnergyDataController;
use App\Http\Controllers\HiringCountController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MinimumWageController;
use App\Http\Controllers\TurnOverController;
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

Route::controller(TurnOverController::class)->group(function(){
    Route::get('/turnover/employee_count/index','employee_index')->name('turnover.employeecount.index');
    Route::get('/turnover/employee_count/edit/{id}','employee_edit')->name('turnover.employeecount.edit');
    Route::patch('/turnover/employee_count/update/{id}','employee_update')->name('turnover.employeecount.update');
    Route::get('/turnover/worker_count/index','worker_index')->name('turnover.workercount.index');
    Route::get('/turnover/worker_count/edit/{id}','worker_edit')->name('turnover.workercount.edit');
    Route::patch('/turnover/worker_count/update/{id}','worker_update')->name('turnover.workercount.update');
});

Route::controller(DifferentlyAbledController::class)->group(function(){
    Route::get('/differently_abled/employee_count/index','employee_index')->name('differently_abled.employeecount.index');
    Route::get('/differently_abled/employee_count/edit/{id}','employee_edit')->name('differently_abled.employeecount.edit');
    Route::patch('/differently_abled/employee_count/update/{id}','employee_update')->name('differently_abled.employeecount.update');
    Route::get('/differently_abled/worker_count/index','worker_index')->name('differently_abled.workercount.index');
    Route::get('/differently_abled/worker_count/edit/{id}','worker_edit')->name('differently_abled.workercount.edit');
    Route::patch('/differently_abled/worker_count/update/{id}','worker_update')->name('differently_abled.workercount.update');
});

Route::controller(EmployeeWorkerBenefitController::class)->group(function(){
    Route::get('/employee_worker_benefits/employee_count/index','employee_index')->name('employee_worker_benefits.employeecount.index');
    Route::get('/employee_worker_benefits/employee_count/edit/{id}','employee_edit')->name('employee_worker_benefits.employeecount.edit');
    Route::patch('/employee_worker_benefits/employee_count/update/{id}','employee_update')->name('employee_worker_benefits.employeecount.update');
    Route::get('/employee_worker_benefits/worker_count/index','worker_index')->name('employee_worker_benefits.workercount.index');
    Route::get('/employee_worker_benefits/worker_count/edit/{id}','worker_edit')->name('employee_worker_benefits.workercount.edit');
    Route::patch('/employee_worker_benefits/worker_count/update/{id}','worker_update')->name('employee_worker_benefits.workercount.update');
});

Route::controller(MinimumWageController::class)->group(function(){
    Route::get('/minimum_wage/employee_count/index','employee_index')->name('minimum_wage.employeecount.index');
    Route::get('/minimum_wage/employee_count/edit/{id}','employee_edit')->name('minimum_wage.employeecount.edit');
    Route::patch('/minimum_wage/employee_count/update/{id}','employee_update')->name('minimum_wage.employeecount.update');
    Route::get('/minimum_wage/worker_count/index','worker_index')->name('minimum_wage.workercount.index');
    Route::get('/minimum_wage/worker_count/edit/{id}','worker_edit')->name('minimum_wage.workercount.edit');
    Route::patch('/minimum_wage/worker_count/update/{id}','worker_update')->name('minimum_wage.workercount.update');
});

});
