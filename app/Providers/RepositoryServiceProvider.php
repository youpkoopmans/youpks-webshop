<?php


namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\ProductRepositoryInterface;
use App\Repositories\ProductRepository;

class RepositoryServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->registerProductRepository();
    }

    private function registerProductRepository()
    {
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
    }


}
