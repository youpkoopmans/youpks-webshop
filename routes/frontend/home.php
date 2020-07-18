<?php

use App\Controllers\Frontend\HomeController;

// Home Index
Route::get('', [HomeController::class, 'index'])
    ->name('.index');
