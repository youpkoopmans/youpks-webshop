<?php

use Illuminate\Support\Facades\Route;

// Frontend Routes
Route::name('.frontend')
    ->group(function () {

    // Page Routes
    include 'pages.php';

});
