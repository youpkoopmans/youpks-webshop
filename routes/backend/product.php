<?php

use App\Controllers\Backend\ProductController;

// Product Index
Route::get('', [ProductController::class, 'index'])
    ->name('.index');

// Product Create
Route::get('create', [ProductController::class, 'create'])
    ->name('.create');

// Product Store
Route::post('store', [ProductController::class, 'store'])
    ->name('.store');

// Product Edit
Route::get('edit/{product}', [ProductController::class, 'edit'])
    ->name('.edit');

// Product Update
Route::post('update/{product}', [ProductController::class, 'update'])
    ->name('.update');

// Product Destroy
Route::get('destroy/{product}', [ProductController::class, 'destroy'])
    ->name('.destroy');

// Product Export Excel
Route::get('export/excel', [ProductController::class, 'exportExcel'])
    ->name('.export-excel');
