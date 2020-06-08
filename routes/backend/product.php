<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\ProductController as Product;

// Product Index
Route::get('', [Product::class, 'index'])
    ->name('.index');

// Product Create
Route::get('create', [Product::class, 'create'])
    ->name('.create');

// Product Store
Route::post('store', [Product::class, 'store'])
    ->name('.store');

// Product Edit
Route::get('edit/{product}', [Product::class, 'edit'])
    ->name('.edit');

// Product Update
Route::post('update/{product}', [Product::class, 'update'])
    ->name('.update');

// Product Destroy
Route::get('destroy/{product}', [Product::class, 'destroy'])
    ->name('.destroy');

// Product Export Excel
Route::get('export/excel', [Product::class, 'exportExcel'])
    ->name('.export-excel');
