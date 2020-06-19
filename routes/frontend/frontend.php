<?php

// Frontend Routes
Route::name('frontend')
    ->group(function () {

        // Home
        Route::name('.home')
            ->group(route_frontend('home.php'));

    });
