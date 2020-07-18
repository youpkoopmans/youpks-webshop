<?php

use App\Controllers\Backend\HomeController;

// Home Index
Route::get('', [HomeController::class, 'index'])
    ->name('.index');
