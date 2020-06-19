<?php

use App\Http\Controllers\Frontend\HomeController as Home;

// Home Index
Route::get('', [Home::class, 'index'])
    ->name('.index');
