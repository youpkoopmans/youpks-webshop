<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\BrandController as Brand;

// Brand Index
Route::get('', [Brand::class, 'index'])
    ->name('.index');

// Brand Create
Route::get('create', [Brand::class, 'create'])
    ->name('.create');

// Brand Store
Route::post('store', [Brand::class, 'store'])
    ->name('.store');

// Brand Edit
Route::get('edit/{brand}', [Brand::class, 'edit'])
    ->name('.edit');

// Brand Update
Route::post('update/{brand}', [Brand::class, 'update'])
    ->name('.update');

// Brand Destroy
Route::get('destroy/{brand}', [Brand::class, 'destroy'])
    ->name('.destroy');

// Brand Export Excel
Route::get('export/excel', [Brand::class, 'exportExcel'])
    ->name('.export-excel');
