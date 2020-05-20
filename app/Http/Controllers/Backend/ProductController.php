<?php

namespace App\Http\Controllers\Backend;

use App\Models\Product;
use App\Validation\ProductRules;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;

class ProductController
{
    use ValidatesRequests;

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
     * Store a newly created product in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, ProductRules::store());
        Product::create($request->request->all());

        return redirect()->route('backend.product.index');
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

    /**
     * Update the specified product in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Product $product)
    {
        $product = Product::findOrFail($product->id);
        $this->validate($request, ProductRules::update());
        $product->update($request->request->all());

        return redirect()->route('backend.product.index');
    }

    /**
     * Remove the specified product from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Product $product)
    {
        $product = Product::findOrFail($product->id);
        $product->delete();

        return redirect()->route('backend.product.index');
    }

}
