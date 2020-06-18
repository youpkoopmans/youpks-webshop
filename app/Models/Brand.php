<?php

namespace App\Models;

use App\Traits\ModelHelpers;
use App\Traits\Scopes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Brand extends Model
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
