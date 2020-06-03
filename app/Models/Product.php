<?php

namespace App\Models;

use App\Traits\ModelHelpers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use ModelHelpers;

    /**
     * @var string[]
     */
    protected $fillable = [
        'title',
        'brand_id',
        'category_id',
        'slug',
        'intro',
        'body',
        'price',
        'image',
        'published_at'
    ];

    /**
     * @var string[]
     */
    protected $dates = [
        'published_at'
    ];

    /**
     * @return BelongsTo
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    /**
     * @return BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return BelongsToMany
     */
    public function files()
    {
        return $this->belongsToMany(File::class);
    }

}
