<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Artisan;
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

Route::get('/run-artisan', function () {
    Artisan::call('migrate', ['--force' => true]);
    Artisan::call('config:cache');
    Artisan::call('route:cache');
    Artisan::call('cache:clear');
    return "Commands executed successfully!";
});

// Appointments routes
Route::prefix('appointments')->name('appointments.')->group(function () {
    Route::get('/', [AppointmentController::class, 'index'])->name('index');
    Route::get('/create', [AppointmentController::class, 'create'])->name('create');
    Route::post('/', [AppointmentController::class, 'store'])->name('store');
    Route::get('/calendar', [AppointmentController::class, 'calendar'])->name('calendar');
    Route::get('/events', [AppointmentController::class, 'events'])->name('events');
    // ✅ New route for handling booking creation with a selected date
    Route::get('/createbooking', [AppointmentController::class, 'createBooking'])->name('createbooking');
});

// Admin routes
Route::prefix('admins')->name('admins.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::get('/create', [AdminController::class, 'create'])->name('create');
    Route::post('/', [AdminController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [AdminController::class, 'edit'])->name('edit');
    Route::put('/{id}', [AdminController::class, 'update'])->name('update');
    Route::delete('/{id}', [AdminController::class, 'destroy'])->name('destroy');

    Route::prefix('appointments')->name('appointments.')->group(function () {
        Route::get('/', [AdminController::class, 'appointments'])->name('index');
        Route::get('/export', [AdminController::class, 'exportAppointments'])->name('export');
        Route::get('/{appointment}', [AdminController::class, 'showAppointment'])->name('show');
        Route::get('/{appointment}/edit', [AdminController::class, 'editAppointment'])->name('edit');
        Route::put('/{appointment}', [AdminController::class, 'updateAppointment'])->name('update');
        Route::delete('/{appointment}', [AdminController::class, 'destroyAppointment'])->name('destroy');
        Route::patch('/{id}/approve', [AdminController::class, 'approveAppointment'])->name('approve');

    
        // ✅ Add the missing approve route
        // Route::patch('/{appointment}/approve', [AdminController::class, 'approveAppointment'])->name('approve');
        Route::patch('/{id}/approve', [AdminController::class, 'approveAppointment'])->name('approve');
    });
});
