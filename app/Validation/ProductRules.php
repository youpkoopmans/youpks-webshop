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
            'intro' => 'required|min:5',
            'body' => 'required|min:5',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];

    }

    static public function update(): array
    {
        return [
            'title' => 'required',
            'intro' => 'required|min:5',
            'body' => 'required|min:5',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    static public function destroy(): array
    {
        return [
            'id' => 'required'
        ];
    }
}
