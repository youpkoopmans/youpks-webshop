<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class TranslationServiceProvider extends ServiceProvider
{
    /**
     * Boot all translation files
     */
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang/backend', 'b');
        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang/frontend', 'f');
    }





}
