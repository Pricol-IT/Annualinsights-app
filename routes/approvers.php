<?php

use App\Http\Controllers\ApproverController;
use Illuminate\Support\Facades\Route;

Route::prefix('approver')->middleware('approver')->group(function () {
    Route::get('/dashboard', [ApproverController::class, 'dashboard'])->name('approver.dashboard');
});
