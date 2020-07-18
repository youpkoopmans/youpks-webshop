<?php

use App\Controllers\Backend\BrandController;

// Brand Index
Route::get('', [BrandController::class, 'index'])
    ->name('.index');

// Brand Create
Route::get('create', [BrandController::class, 'create'])
    ->name('.create');

// Brand Store
Route::post('store', [BrandController::class, 'store'])
    ->name('.store');

// Brand Edit
Route::get('edit/{brand}', [BrandController::class, 'edit'])
    ->name('.edit');

// Brand Update
Route::post('update/{brand}', [BrandController::class, 'update'])
    ->name('.update');

// Brand Destroy
Route::get('destroy/{brand}', [BrandController::class, 'destroy'])
    ->name('.destroy');

// Brand Export Excel
Route::get('export/excel', [BrandController::class, 'exportExcel'])
    ->name('.export-excel');
