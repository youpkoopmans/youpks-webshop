<?php

use Illuminate\Support\Facades\Route;

// Backend Routes
Route::prefix('dashboard')
    ->group(function () {

    // Auth Routes
    Auth::routes();

    Route::name('backend')
        ->group(function () {

        // Page Routes
    //    Route::middleware(['auth'])->group(function () {
            include 'pages.php';
    //    });

        // Resouce Routes
        include 'resources.php';

    });
});


