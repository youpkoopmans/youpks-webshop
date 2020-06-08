<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\CategoryController as Category;

// Category Index
Route::get('', [Category::class, 'index'])
    ->name('.index');

// Category Create
Route::get('create', [Category::class, 'create'])
    ->name('.create');

// Category Store
Route::post('store', [Category::class, 'store'])
    ->name('.store');

// Category Edit
Route::get('edit/{category}', [Category::class, 'edit'])
    ->name('.edit');

// Category Update
Route::post('update/{category}', [Category::class, 'update'])
    ->name('.update');

// Category Destroy
Route::get('destroy/{category}', [Category::class, 'destroy'])
    ->name('.destroy');

// Category Export Excel
Route::get('export/excel', [Category::class, 'exportExcel'])
    ->name('.export-excel');
