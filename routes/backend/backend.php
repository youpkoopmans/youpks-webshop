<?php

use Illuminate\Support\Facades\Route;

// Backend Routes
Route::prefix('dashboard')
    ->group(function () {

    // Auth Routes
    Auth::routes();

    Route::name('backend')
        ->group(function () {

        // Home
        Route::name('.home')
            ->group(function () {

                include 'home.php';

            });

        // Product
        Route::name('.product')
            ->prefix('product')
            ->group(function () {

            include 'product.php';

        });
    });
});


