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
            'slug' => 'required',
            'intro' => 'required|min:5',
            'body' => 'required|min:5',
        ];

    }

    static public function update(): array
    {
        return [
            'title' => 'required',
            'slug' => 'required',
            'intro' => 'required|min:5',
            'body' => 'required|min:5',
        ];

    }
}
