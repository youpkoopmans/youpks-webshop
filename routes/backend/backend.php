<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Backend Routes
Route::prefix('dashboard')
    ->group(function () {

        // Auth
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


