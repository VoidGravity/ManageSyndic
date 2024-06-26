<?php

use Illuminate\Support\Facades\Route;
use App\Enums\UserRole;


Route::get('/', function () {
    return view('welcome');
});
Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->prefix('dashboard')->name('dashboard')->group(function () {
    Route::middleware(['role:'.UserRole::ADMIN->value])->prefix('/admin')->name('.admin')->group(function () {
        Route::get('/', function () {return view('dashboard.admin.home');})->name('.all');
    });
    Route::middleware(['role:'.UserRole::RESIDENT->value])->prefix('/resident')->name('.resident')->group(function () {
        Route::get('/', function () {return view('dashboard');})->name('.all');
    });
    Route::middleware(['role:'.UserRole::SYNDIC->value])->prefix('/syndic')->name('.syndic')->group( function () {
        Route::get('/', function () {return view('dashboard');})->name('.all');
    });
});
