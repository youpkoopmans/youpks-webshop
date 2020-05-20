<?php

namespace App\Http\Controllers\Backend\Pages;

use App\Models\Product;

class ProductController
{
    /**
     * Display a listing of the product.
     *
     */
    public function index()
    {
        $products = Product::all();
        $data = [
            'products' => $products,
        ];
        return view('backend.pages.product.index')->with($data);
    }

    /**
     * Show the form for creating a new product.
     *
     */
    public function create()
    {
        return view('backend.pages.product.form.create');
    }

    /**
     * Show the form for editing the specified product.
     *
     * @param  \App\Models\Product  $product
     */
    public function edit(Product $product)
    {
        $product = Product::findOrFail($product->id);
        $data = [
            'product' => $product,
        ];
        return view('backend.pages.product.form.edit')->with($data);
    }

}
