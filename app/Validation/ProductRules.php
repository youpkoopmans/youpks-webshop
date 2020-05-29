<?php

namespace App\Validation;

use App\Models\Product;

class ProductRules
{
    /** @var Product */
    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    static public function store(): array
    {
        return [
            'title' => 'required',
            'brand_id' => 'required',
            'category_id' => 'required',
            'intro' => 'required|min:5',
            'body' => 'required|min:5',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];

    }

    static public function update(): array
    {
        return [
            'title' => 'required',
            'brand_id' => 'required',
            'category_id' => 'required',
            'intro' => 'required|min:5',
            'body' => 'required|min:5',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

}
