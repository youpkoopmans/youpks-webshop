<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

// Authentication Routes

// Show Login Form
Route::get('login', [LoginController::class, 'showLoginForm'])
    ->name('.login');

// Login
Route::post('', [LoginController::class, 'login']);

// Logout
Route::post('logout', [LoginController::class, 'logout'])
    ->name('.logout');

