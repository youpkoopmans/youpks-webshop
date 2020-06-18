<?php

namespace App\Models;

use App\Traits\ModelHelpers;
use App\Traits\Scopes;
use Baum\Node;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Node
{
    use ModelHelpers,
        Scopes;

    /**
     * @var string[]
     */
    protected $fillable = [
        'title',
        'slug',
        'published_at'
    ];

    /**
     * @var string[]
     */
    protected $dates = [
        'published_at'
    ];

    /**
     * @return HasMany
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
