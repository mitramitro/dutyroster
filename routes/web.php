<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\OnDutyRosterController;
use Illuminate\Support\Facades\Route;



// Route::get('/', [AuthController::class, 'index'])->name('pageLogin');
// Route::post('/login', [AuthController::class, 'authenticate'])->name('login');
// Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
// Route::resource('users', UserController::class);

// // Route::middleware(['auth'])->group(function () {
// Route::resource('onduty', OnDutyRosterController::class)->except(['show']);
// Route::resource('employees', EmployeeController::class);
// Route::resource('locations', LocationController::class);
// Route::get('/preview/{id}', [OnDutyRosterController::class, 'preview'])->name('onduty.preview');
// Route::get('/publish', [OnDutyRosterController::class, 'publishDisplay'])->name('onduty.publish');
// Route::get('/onduty/latest', [OnDutyRosterController::class, 'latest'])->name('onduty.latest');
// Route::post('onduty/toggle-publish/{id}', [OnDutyRosterController::class, 'togglePublish'])->name('onduty.togglePublish');
// --- Login & Logout
Route::get('/', [AuthController::class, 'index'])->name('pageLogin');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// --- Route Publik (tidak perlu login)
Route::get('/publish', [OnDutyRosterController::class, 'publishDisplay'])->name('onduty.publish');

// --- Route Khusus Login
Route::middleware(['auth'])->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('onduty', OnDutyRosterController::class)->except(['show']);
    Route::resource('employees', EmployeeController::class);
    Route::resource('locations', LocationController::class);

    Route::get('/preview/{id}', [OnDutyRosterController::class, 'preview'])->name('onduty.preview');
    Route::get('/onduty/latest', [OnDutyRosterController::class, 'latest'])->name('onduty.latest');
    Route::post('onduty/toggle-publish/{id}', [OnDutyRosterController::class, 'togglePublish'])->name('onduty.togglePublish');
});
