<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'title',
        'slug',
        'intro',
        'body',
        'image',
        'published_at'
    ];

    /**
     * @var string[]
     */
    protected $dates = [
        'published_at'
    ];

    public function getActiveAttribute()
    {
        if($this->published_at != null) {
            return '<i class="fa fa-check"></i>';
        }
        return '<i class="fa fa-ban"></i>';
    }

}
