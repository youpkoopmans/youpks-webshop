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
                    ->group(route_backend('home.php'));

                // Product
                Route::name('.product')
                    ->prefix('product')
                    ->group(route_backend('product.php'));

                // Brand
                Route::name('.brand')
                    ->prefix('brand')
                    ->group(route_backend('brand.php'));

                // Category
                Route::name('.category')
                    ->prefix('category')
                    ->group(route_backend('category.php'));
            });
    });


