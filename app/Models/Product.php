<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'title',
        'brand_id',
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
     * @return string
     */
    public function getActiveAttribute()
    {
        if($this->published_at != null) {
            return '<i class="fa fa-check"></i>';
        }
        return '<i class="fa fa-ban"></i>';
    }

}
