<?php

use App\Controllers\Backend\CategoryController;

// Category Index
Route::get('', [CategoryController::class, 'index'])
    ->name('.index');

// Category Create
Route::get('create', [CategoryController::class, 'create'])
    ->name('.create');

// Category Store
Route::post('store', [CategoryController::class, 'store'])
    ->name('.store');

// Category Edit
Route::get('edit/{category}', [CategoryController::class, 'edit'])
    ->name('.edit');

// Category Update
Route::post('update/{category}', [CategoryController::class, 'update'])
    ->name('.update');

// Category Destroy
Route::get('destroy/{category}', [CategoryController::class, 'destroy'])
    ->name('.destroy');

// Category Export Excel
Route::get('export/excel', [CategoryController::class, 'exportExcel'])
    ->name('.export-excel');
