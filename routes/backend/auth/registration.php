<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;

// Registration Routes

// Show Registration Form
Route::get('register', [RegisterController::class, 'showRegistrationForm'])
    ->name('.register');

// Register
Route::post('register', [RegisterController::class, 'register']);

