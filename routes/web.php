<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientConferenceController;
use App\Http\Controllers\EmployeeConferenceController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminConferenceController;



/*----- Home page route -----*/

Route::get('/', function () {
    return view('home');
})->name('home');


/*----- Client -----*/

Route::get('/client/conferences', [ClientConferenceController::class, 'index'])
    ->name('client.conferences');


Route::get('/client/conferences/registrations', function () {
    return view('client.registrations');
})->name('client.conferences.registrations');

Route::get('/client/conferences/{id}', [ClientConferenceController::class, 'show'])
    ->name('client.conferences.show');

Route::post('/client/conferences/{id}/register', [ClientConferenceController::class, 'register'])
    ->name('client.conferences.register'); 


/*----- Employee -----*/

Route::prefix('employee')->name('employee.')->group(function () {
    Route::get('/conferences', [EmployeeConferenceController::class, 'index'])
        ->name('conferences'); 

    Route::get('/conferences/{id}', [EmployeeConferenceController::class, 'show'])
        ->name('conferences.show');
});



/*----- Admin -----*/

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');

    Route::get('/users', [AdminUserController::class, 'index'])->name('users.index');
    Route::get('/users/{id}/edit', [AdminUserController::class, 'edit'])->name('users.edit');
    Route::post('/users/{id}', [AdminUserController::class, 'update'])->name('users.update');

    Route::get('/conferences', [AdminConferenceController::class, 'index'])->name('conferences.index');
    Route::get('/conferences/create', [AdminConferenceController::class, 'create'])->name('conferences.create');
    Route::post('/conferences', [AdminConferenceController::class, 'store'])->name('conferences.store');
    Route::get('/conferences/{id}', [AdminConferenceController::class, 'show'])->name('conferences.show');
    Route::get('/conferences/{id}/edit', [AdminConferenceController::class, 'edit'])->name('conferences.edit');
    Route::post('/conferences/{id}', [AdminConferenceController::class, 'update'])->name('conferences.update');
    Route::delete('/conferences/{id}', [AdminConferenceController::class, 'destroy'])->name('conferences.destroy');
});


