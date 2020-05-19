<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Pages\HomeController;

// Page Routes
Route::name('.page')
    ->group(function () {

    // Index
    Route::get('', [HomeController::class, 'index'])
        ->name('.index');

});



