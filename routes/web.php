<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TugasController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');})->name('welcome');

// Logout
    Route::get('logout', [AuthController::class,'logout'])->name('logout');

// Login
Route::get('login', [AuthController::class,'login'])->name('login');
Route::post('login', [AuthController::class,'loginProses'])->name('loginProses');

Route::middleware('checkLogin')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::get('/user', [UserController::class, 'index'])
        ->name('user');
    Route::get('user/create', [UserController::class, 'create'])
        ->name('userCreate');
    Route::post('user/store', [UserController::class, 'store'])
        ->name('userStore');

    Route::get('user/edit/{id}', [UserController::class, 'edit'])
        ->name('userEdit');

    Route::put('user/update/{id}', [UserController::class, 'update'])
        ->name('userUpdate');

    Route::delete('user/delete/{id}', [UserController::class, 'destroy'])
        ->name('userDelete');

    Route::get('/tugas', [TugasController::class, 'index'])
        ->name('tugas');

        Route::get('tugas/create', [TugasController::class, 'create'])
    ->name('tugasCreate');

Route::post('tugas/store', [TugasController::class, 'store'])
    ->name('tugasStore');

Route::get('tugas/edit/{id}', [TugasController::class, 'edit'])
    ->name('tugasEdit');

Route::put('tugas/update/{id}', [TugasController::class, 'update'])
    ->name('tugasUpdate');

Route::delete('tugas/delete/{id}', [TugasController::class, 'destroy'])
    ->name('tugasDelete');

});

