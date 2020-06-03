<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class MigrationServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->bootMigrations('user');
        $this->bootMigrations('product');
        $this->bootMigrations('brand');
        $this->bootMigrations('category');
        $this->bootMigrations('file');
    }

    private function bootMigrations($model)
    {
        $this->loadMigrationsFrom(__DIR__ . "/../../database/migrations/$model/");
    }




}
