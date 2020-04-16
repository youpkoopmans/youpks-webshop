<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;

// Password Reset Routes

// Send Reset Link Email
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])
    ->name('.password.email');

// Show Link Request Form
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])
    ->name('.password.request');

// Reset
Route::post('password/reset', [ResetPasswordController::class, 'reset'])
    ->name('.password.update');

// Show Reset Form
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])
    ->name('.password.reset');
