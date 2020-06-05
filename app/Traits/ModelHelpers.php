<?php

namespace App\Traits;

trait ModelHelpers
{
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
