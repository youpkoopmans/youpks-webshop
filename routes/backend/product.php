<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Pages\ProductController as Product;

// Product Index
Route::get('', [Product::class, 'index'])
    ->name('.index');

// Product Create
Route::get('create', [Product::class, 'create'])
    ->name('.create');

// Product Edit
Route::get('edit/{product}', [Product::class, 'edit'])
    ->name('.edit');
