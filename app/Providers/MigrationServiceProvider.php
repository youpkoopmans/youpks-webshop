<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class MigrationServiceProvider extends ServiceProvider
{
    /**
     * Boot all Migrations
     */
    public function boot()
    {
        $this->bootMigrations('user');
        $this->bootMigrations('product');
        $this->bootMigrations('brand');
        $this->bootMigrations('category');
        $this->bootMigrations('file');
    }

    /**
     * @param $directory
     */
    private function bootMigrations($directory)
    {
        $this->loadMigrationsFrom(__DIR__ . "/../../database/migrations/$directory/");
    }




}
