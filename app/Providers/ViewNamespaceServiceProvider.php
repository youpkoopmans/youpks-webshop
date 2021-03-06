<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewNamespaceServiceProvider extends ServiceProvider
{
    /**
     * Boot all View directories & define Namespaces
     */
    public function boot()
    {
        $this->bootPageViews('home');
        $this->bootPageViews('product');
        $this->bootPageViews('brand');
        $this->bootPageViews('category');

        $this->loadViewsFrom(__DIR__ . '/../../resources/views/backend/', 'b');
        $this->loadViewsFrom(__DIR__ . '/../../resources/views/frontend/', 'f');
    }

    /**
     * @param $model
     */
    private function bootPageViews($model)
    {
        $this->loadViewsFrom(__DIR__ . '/../../resources/views/backend/pages/' . $model, 'b:' . $model);
        $this->loadViewsFrom(__DIR__ . '/../../resources/views/frontend/pages/' . $model, 'f:' . $model);
    }




}
