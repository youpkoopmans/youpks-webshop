<?php

namespace App\Traits;

trait Scopes
{
    /**
     * @param $query
     * @return mixed
     */
    public function scopePublished($query)
    {
        return $query->whereNotNull('published_at');
    }

    /**
     * @return mixed
     */
    public function published()
    {
        return $this->model->published();
    }

}
