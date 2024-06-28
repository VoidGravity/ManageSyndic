<?php

use Illuminate\Support\Facades\Route;
use App\Enums\UserRole;

/**
 * Note: 
 *      "all" => Get all page view ** use GET **
 *      "create" => Get create page view ** use GET **
 *      "save" => Save data to db ** use POST **
 *      "edit" => Get edit page view ** use GET **
 *      "update" => Update data in db ** use PUT **
 *      "delete" => Delete data from db ** use GET **
 */

Route::get('/', function () {

    return view('welcome');

});
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->prefix('/dashboard')->name('dashboard')->group(function () {
    
    Route::get('/', [App\Http\Controllers\Dashboard\DashboardController::class, 'all'])->name('.all');

    Route::middleware(['role:' . UserRole::ADMIN->value])->prefix('/syndic')->name('.syndic')->group(function () {
        
        Route::get('/', [App\Http\Controllers\Dashboard\SyndicController::class, 'all'])->name('.all');
        Route::get('/create', [App\Http\Controllers\Dashboard\SyndicController::class, 'create'])->name('.create');
        Route::post('/create', [App\Http\Controllers\Dashboard\SyndicController::class, 'save'])->name('.save');
        Route::get('/edit/{syndic:id}', [App\Http\Controllers\Dashboard\SyndicController::class, 'edit'])->name('.edit');
        Route::post('/update/{syndic:id}', [App\Http\Controllers\Dashboard\SyndicController::class, 'update'])->name('.update');
        Route::get('/delete/{syndic:id}', [App\Http\Controllers\Dashboard\SyndicController::class, 'delete'])->name('.delete');
    
    });

    Route::middleware(['role:' . UserRole::ADMIN->value . ',' . UserRole::SYNDIC->value])->prefix('/resident')->name('.resident')->group(function () {
        
        Route::get('/', [App\Http\Controllers\Dashboard\ResidentController::class, 'all'])->name('.all');

        // Route::middleware(['role:' . UserRole::ADMIN->value])->group(function () {
            Route::get('/create', [App\Http\Controllers\Dashboard\ResidentController::class, 'create'])->name('.create');
            Route::post('/create', [App\Http\Controllers\Dashboard\ResidentController::class, 'save'])->name('.save');
            Route::get('/edit/{resident:id}', [App\Http\Controllers\Dashboard\ResidentController::class, 'edit'])->name('.edit');
            Route::post('/update/{resident:id}', [App\Http\Controllers\Dashboard\ResidentController::class, 'update'])->name('.update');
            Route::get('/delete/{resident:id}', [App\Http\Controllers\Dashboard\ResidentController::class, 'delete'])->name('.delete');
        // });

    });

    Route::middleware(['role:' . UserRole::ADMIN->value])->prefix('/building')->name('.building')->group(function () {
        
        Route::get('/', [App\Http\Controllers\Dashboard\ResidentialbuildingController::class, 'all'])->name('.all');
        Route::get('/create', [App\Http\Controllers\Dashboard\ResidentialbuildingController::class, 'create'])->name('.create');
        Route::post('/create', [App\Http\Controllers\Dashboard\ResidentialbuildingController::class, 'save'])->name('.save');
        Route::get('/edit/{residentialbuilding:id}', [App\Http\Controllers\Dashboard\ResidentialbuildingController::class, 'edit'])->name('.edit');
        Route::post('/update/{residentialbuilding:id}', [App\Http\Controllers\Dashboard\ResidentialbuildingController::class, 'update'])->name('.update');
        Route::get('/delete/{residentialbuilding:id}', [App\Http\Controllers\Dashboard\ResidentialbuildingController::class, 'delete'])->name('.delete');
    
    });

    Route::middleware(['role:' . UserRole::ADMIN->value . ',' . UserRole::RESIDENT->value . ',' . UserRole::SYNDIC->value])->prefix('/servicing')->name('.servicing')->group(function () {
        
        Route::get('/', [App\Http\Controllers\Dashboard\ServicingController::class, 'all'])->name('.all');

        Route::middleware(['role:' . UserRole::ADMIN->value . ',' . UserRole::SYNDIC->value])->group(function () {
            Route::get('/create', [App\Http\Controllers\Dashboard\ServicingController::class, 'create'])->name('.create');
            Route::post('/create', [App\Http\Controllers\Dashboard\ServicingController::class, 'save'])->name('.save');
            Route::get('/edit/{servicing:id}', [App\Http\Controllers\Dashboard\ServicingController::class, 'edit'])->name('.edit');
            Route::post('/update/{servicing:id}', [App\Http\Controllers\Dashboard\ServicingController::class, 'update'])->name('.update');
            Route::get('/delete/{servicing:id}', [App\Http\Controllers\Dashboard\ServicingController::class, 'delete'])->name('.delete');
        });

    });

    Route::middleware(['role:' . UserRole::ADMIN->value . ',' . UserRole::RESIDENT->value . ',' . UserRole::SYNDIC->value])->prefix('/contribution')->name('.contribution')->group(function () {
        
        Route::get('/', [App\Http\Controllers\Dashboard\ContributionController::class, 'all'])->name('.all');

        Route::middleware(['role:' . UserRole::ADMIN->value . ',' . UserRole::SYNDIC->value])->group(function () {
            //
            Route::get('/create', [App\Http\Controllers\Dashboard\ContributionController::class, 'create'])->name('.create');
            Route::post('/create', [App\Http\Controllers\Dashboard\ContributionController::class, 'save'])->name('.save');
            Route::get('/edit/{contrubtion:id}', [App\Http\Controllers\Dashboard\ContributionController::class, 'edit'])->name('.edit');
            Route::post('/update/{contrubtion:id}', [App\Http\Controllers\Dashboard\ContributionController::class, 'update'])->name('.update');
            Route::get('/delete/{contrubtion:id}', [App\Http\Controllers\Dashboard\ContributionController::class, 'delete'])->name('.delete');
            Route::get('/exportPDF/{id}', [App\Http\Controllers\Dashboard\ContributionController::class, 'exportPDF'])->name('.exportPDF');

        });
        
    });
});
