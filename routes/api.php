<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Enums\UserRole;

Route::post('/login', [App\Http\Controllers\DashboardMobile\AuthController::class, 'login']);

Route::get('/', function () {return "API IS WORKING";});
Route::prefix('/dashboard')->name('dashboard')->group(function () {
    Route::middleware(['mobile:' . UserRole::RESIDENT->value])->get('/', [App\Http\Controllers\DashboardMobile\DashboardController::class, 'all'])->name('.all');
    Route::middleware(['mobile:' . UserRole::RESIDENT->value])->get('/servicing', [App\Http\Controllers\DashboardMobile\ServicingController::class, 'all'])->name('.servicing');
    Route::middleware(['mobile:' . UserRole::RESIDENT->value])->get('/contribution', [App\Http\Controllers\DashboardMobile\ContributionController::class, 'all'])->name('.contribution');
});