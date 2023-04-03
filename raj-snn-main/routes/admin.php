<?php

use App\Modules\HomePage\Banner\Controller\BannerController;
use App\Modules\Profile\Controller\ProfileController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::prefix('/profile')->group(function(){
        Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
    });

    Route::prefix('/home-page')->group(function(){
        Route::prefix('/banner')->group(function(){
            Route::get('/', [BannerController::class, 'list'])->name('banner.list');
            Route::get('/create', [BannerController::class, 'create'])->name('banner.create');
            Route::post('/create', [BannerController::class, 'store'])->name('banner.store');
            Route::get('/edit/{id}', [BannerController::class, 'edit'])->name('banner.edit');
            Route::post('/edit/{id}', [BannerController::class, 'update'])->name('banner.update');
        });
    });
});

require __DIR__.'/auth.php';
