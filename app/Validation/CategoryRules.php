<?php

namespace App\Validation;

use App\Models\Category;

class CategoryRules
{
    /** @var Category */
    protected $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
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

}
