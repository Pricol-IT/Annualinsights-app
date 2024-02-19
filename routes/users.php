<?php

use App\Http\Controllers\EnergyDataController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
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
});
