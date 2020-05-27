<?php

namespace App\Validation;

use App\Models\Brand;

class BrandRules
{
    /** @var Brand */
    protected $brand;

    public function __construct(Brand $brand)
    {
        $this->brand = $brand;
    }

    static public function store(): array
    {
        return [
            'title' => 'required',
        ];

    }

    static public function update(): array
    {
        return [
            'title' => 'required',
        ];
    }

    static public function destroy(): array
    {
        return [
            'id' => 'required'
        ];
    }
}
