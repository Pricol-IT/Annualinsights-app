<?php

use App\Http\Controllers\DifferentlyAbledController;
use App\Http\Controllers\EmployeeWorkerBenefitController;
use App\Http\Controllers\EmployeeWorkerCountController;
use App\Http\Controllers\EnergyDataController;
use App\Http\Controllers\FugitiveEmissionController;
use App\Http\Controllers\HiringCountController;
use App\Http\Controllers\UnionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MinimumWageController;
use App\Http\Controllers\MobileCombustionController;
use App\Http\Controllers\ParentalLeaveController;
use App\Http\Controllers\ProcessEmissionController;
use App\Http\Controllers\RetirementBenefitsController;
use App\Http\Controllers\SafetyDataController;
use App\Http\Controllers\StationaryCombustionController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\TurnOverController;
use App\Http\Controllers\WasteManagementController;
use App\Http\Controllers\WaterManagementController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// use App\Http\Controllers\CheckController;

Route::get('/', function () {
    return view('auth.login');
});

// Route::get('/checkuser/{id}', [App\Http\Controllers\CheckController::class, 'checkuser'])->name('checkuser');

Auth::routes();




Route::prefix('user')->middleware('user')->group(function () {
    Route::get('/dashboard', [UserController::class, 'index'])->name('user.dashboard');
    Route::get('/commuteform', [UserController::class, 'commuteform'])->name('user.commuteform');
    Route::get('/financialyear', [UserController::class, 'financialyear'])->name('user.financialyear');
    Route::post('/generateyear', [UserController::class, 'generatefinancialyear'])->name('user.generateyear');

});



