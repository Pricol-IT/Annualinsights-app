<?php

use App\Http\Controllers\ApproverController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware('admin')->group(function () {
    Route::get('/dashboard', [ApproverController::class, 'dashboard'])->name('admin.dashboard');
});
