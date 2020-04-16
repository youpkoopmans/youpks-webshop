<?php

use Illuminate\Support\Facades\Route;

// Auth Routes
Route::name('.auth')
    ->group(function () {

    // Authentication Routes
    include 'authentication.php';

    // Password Reset Routes
    include 'passwordReset.php';

    // Registration Routes
    include 'registration.php';

});
