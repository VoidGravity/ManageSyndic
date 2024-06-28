<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Enums\UserRole;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::get('/', function () {

    return view('welcome');

});
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->prefix('/dashboard')->name('dashboard')->group(function () {
    
    Route::get('/', [App\Http\Controllers\DashboardMobile\DashboardController::class, 'all'])->name('.all');

    Route::middleware(['role:' . UserRole::ADMIN->value])->prefix('/syndic')->name('.syndic')->group(function () {
        
        Route::get('/', [App\Http\Controllers\DashboardMobile\SyndicController::class, 'all'])->name('.all');
        Route::get('/create', [App\Http\Controllers\DashboardMobile\SyndicController::class, 'create'])->name('.create');
        Route::post('/create', [App\Http\Controllers\DashboardMobile\SyndicController::class, 'save'])->name('.save');
        Route::get('/edit/{syndic:id}', [App\Http\Controllers\DashboardMobile\SyndicController::class, 'edit'])->name('.edit');
        Route::post('/update/{syndic:id}', [App\Http\Controllers\DashboardMobile\SyndicController::class, 'update'])->name('.update');
        Route::get('/delete/{syndic:id}', [App\Http\Controllers\DashboardMobile\SyndicController::class, 'delete'])->name('.delete');
    
    });

    Route::middleware(['role:' . UserRole::ADMIN->value . ',' . UserRole::SYNDIC->value])->prefix('/resident')->name('.resident')->group(function () {
        
        Route::get('/', [App\Http\Controllers\DashboardMobile\ResidentController::class, 'all'])->name('.all');

        // Route::middleware(['role:' . UserRole::ADMIN->value])->group(function () {
            Route::get('/create', [App\Http\Controllers\DashboardMobile\ResidentController::class, 'create'])->name('.create');
            Route::post('/create', [App\Http\Controllers\DashboardMobile\ResidentController::class, 'save'])->name('.save');
            Route::get('/edit/{resident:id}', [App\Http\Controllers\DashboardMobile\ResidentController::class, 'edit'])->name('.edit');
            Route::post('/update/{resident:id}', [App\Http\Controllers\DashboardMobile\ResidentController::class, 'update'])->name('.update');
            Route::get('/delete/{resident:id}', [App\Http\Controllers\DashboardMobile\ResidentController::class, 'delete'])->name('.delete');
        // });

    });

    Route::middleware(['role:' . UserRole::ADMIN->value])->prefix('/building')->name('.building')->group(function () {
        
        Route::get('/', [App\Http\Controllers\DashboardMobile\ResidentialbuildingController::class, 'all'])->name('.all');
        Route::get('/create', [App\Http\Controllers\DashboardMobile\ResidentialbuildingController::class, 'create'])->name('.create');
        Route::post('/create', [App\Http\Controllers\DashboardMobile\ResidentialbuildingController::class, 'save'])->name('.save');
        Route::get('/edit/{residentialbuilding:id}', [App\Http\Controllers\DashboardMobile\ResidentialbuildingController::class, 'edit'])->name('.edit');
        Route::post('/update/{residentialbuilding:id}', [App\Http\Controllers\DashboardMobile\ResidentialbuildingController::class, 'update'])->name('.update');
        Route::get('/delete/{residentialbuilding:id}', [App\Http\Controllers\DashboardMobile\ResidentialbuildingController::class, 'delete'])->name('.delete');
    
    });

    Route::middleware(['role:' . UserRole::ADMIN->value . ',' . UserRole::RESIDENT->value . ',' . UserRole::SYNDIC->value])->prefix('/servicing')->name('.servicing')->group(function () {
        
        Route::get('/', [App\Http\Controllers\DashboardMobile\ServicingController::class, 'all'])->name('.all');

        Route::middleware(['role:' . UserRole::ADMIN->value . ',' . UserRole::SYNDIC->value])->group(function () {
            Route::get('/create', [App\Http\Controllers\DashboardMobile\ServicingController::class, 'create'])->name('.create');
            Route::post('/create', [App\Http\Controllers\DashboardMobile\ServicingController::class, 'save'])->name('.save');
            Route::get('/edit/{servicing:id}', [App\Http\Controllers\DashboardMobile\ServicingController::class, 'edit'])->name('.edit');
            Route::post('/update/{servicing:id}', [App\Http\Controllers\DashboardMobile\ServicingController::class, 'update'])->name('.update');
            Route::get('/delete/{servicing:id}', [App\Http\Controllers\DashboardMobile\ServicingController::class, 'delete'])->name('.delete');
        });

    });

    Route::middleware(['role:' . UserRole::ADMIN->value . ',' . UserRole::RESIDENT->value . ',' . UserRole::SYNDIC->value])->prefix('/contribution')->name('.contribution')->group(function () {
        
        Route::get('/', [App\Http\Controllers\DashboardMobile\ContributionController::class, 'all'])->name('.all');

        Route::middleware(['role:' . UserRole::ADMIN->value . ',' . UserRole::SYNDIC->value])->group(function () {
            //
            Route::get('/create', [App\Http\Controllers\DashboardMobile\ContributionController::class, 'create'])->name('.create');
            Route::post('/create', [App\Http\Controllers\DashboardMobile\ContributionController::class, 'save'])->name('.save');
            Route::get('/edit/{contrubtion:id}', [App\Http\Controllers\DashboardMobile\ContributionController::class, 'edit'])->name('.edit');
            Route::post('/update/{contrubtion:id}', [App\Http\Controllers\DashboardMobile\ContributionController::class, 'update'])->name('.update');
            Route::get('/delete/{contrubtion:id}', [App\Http\Controllers\DashboardMobile\ContributionController::class, 'delete'])->name('.delete');
            Route::get('/exportPDF/{id}', [App\Http\Controllers\DashboardMobile\ContributionController::class, 'exportPDF'])->name('.exportPDF');

        });
        
    });
});

