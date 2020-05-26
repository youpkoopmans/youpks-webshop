<?php

namespace App\Traits;

use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

trait CommonFields
{
    /**
     * @param $attributes
     * @param $request
     * @return array
     */
    public function setPublishedAt($attributes, $request)
    {
        if($request['active'] == 1){
            $publishedAt = now();
        } else{
            $publishedAt = null;
        }
        $attributes = array_merge($attributes, ['published_at' => $publishedAt]);

        return $attributes;
    }

    /**
     * @param $attributes
     * @return array
     */
    public function setSlug($attributes): array
    {
        $slug = Str::slug($attributes['title'] . ($this->model->whereTitle($attributes['title'])->exists() ? \Carbon\Carbon::now()->format('-d-m-Y') : ''));
        $attributes = array_merge($attributes, ['slug' => $slug]);

        return $attributes;
    }

}
